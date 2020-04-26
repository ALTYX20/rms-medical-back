<?php


namespace App\Service;

use App\Entity\Presentation;
use App\Entity\Users; 
use App\Entity\Media;
use App\Entity\Referance;
use App\Entity\Project;
use App\Entity\Log;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\PresentationServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;



class PresentationService implements PresentationServiceInterface
{
    private $entityManager;
    private $serializer;
    private $tokenStorage;

    public function __construct(
        EntityManagerInterface $entityManager ,
        TokenStorageInterface $tokenStorage )
    {
        $this->entityManager = $entityManager;
        $this->serializer = new Serializer(
            [new GetSetMethodNormalizer(), new ArrayDenormalizer()],
            [new JsonEncoder()]
        );
        $this->tokenStorage = $tokenStorage;
    }


    /**
     * @return object[]
     */
    function getAllPresentation() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.territories , u.nom as presentationCreator  ')
            ->from('App:Presentation', 'p')
            ->join('p.presentationCreator' , 'u')
            ->where('p.company = :company')
            ->setParameter('company', $this->getUser()->getCompany())
            ->getQuery()->getResult();
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getPresentationById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.territories , u.nom as presentationCreator , pro.titre as project ')
            ->from('App:Presentation', 'p')
            ->join('p.presentationCreator' , 'u')
            ->join('p.project' , 'pro')
            ->where('p.id = :id')
            ->setparameter('id' , $id)
            ->getQuery()->getResult();
    }

    /**
     * @return Users
     *
     * @throws UnauthorizedHttpException
     */
    public function getUser(): Users
    {
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(
            ['email' =>  $this->tokenStorage->getToken()->getUser()->getUsername()]
        );

        if (null === $user) {
            throw new UnauthorizedHttpException('/');
        }

        return $user;
    }

    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetPresentation(Request $request){

        
        $presentation = new Presentation();
        $presentation->setTitre($request->get('titre'));
        $presentation->setTerritories($request->get('territories'));
        $presentation->setPresentationCreator($this->getUser());
        $presentation->setCompany($this->getUser()->getCompany());
        
        $projects[] = $request->get('project');
        foreach($projects[0] as $project){
            $presentation->addProject($this->entityManager->getRepository(Project::class)->find($project));
        }

        if($request->get('referance')){
            $referances = $request->get('referance');
            foreach ($referances[0] as $referance){
                $presentation->addReferance($this->entityManager->getRepository(Referance::class)->find($referance));
            }
        }

        if($request->get('media')){
            $medias[] = $request->get('media');
            foreach ( $medias[0] as $media){
                $presentation->addMedia($this->entityManager->getRepository(Media::class)->find($media));
            }
        }
        //Prepare and inject Presentation into database
        $this->entityManager->persist($presentation);
        $this->entityManager->flush();
        
        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->getUser());
        $log->setCompany($this->getUser()->getCompany());
        $log->setAction("Add Presentation");
        $log->setModule("Presentation");
        $log->setUrl('/presentation');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'Presentation added successfully ';
    }


    /**
     * @param Request $request
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function ModifyPresentation(int $id,Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->find($id);
        if($presentation){

            $presentation->setTitre($request->get('titre'));
            $presentation->setTerritories($request->get('territories'));

            if($request->get('project')){

                //remove all old related Project
                $projects[] = $presentation->getProject();
                foreach($projects[0] as $project){
                    $presentation->removeProject($project);
                }

                //adding new project
                /** @var Project $projects */
                $projects[] = $request->get('project');
                foreach($projects[0] as $project){
                    $presentation->addProject($this->entityManager->getRepository(Project::class)->find($project));
                }
            }


            if($request->get('referance')){
                //remove all Old references
                $referances[] = $presentation->getReferance();
                foreach($referances[0] as $referance){
                    $presentation->removeReferance($referance);
                }
                //adding new referances
                $referances[] = $request->get('referance');
                foreach($referances[0] as $referance){
                    $presentation->addReferance($this->entityManager->getRepository(Referance::class)->find($referance));
                }

            }

            if($request->get('media')){
                //remove all old Media
                $medias[] = $presentation->getMedia();
                foreach($medias[0] as $media){
                    $presentation->removeMedia($media);
                }
                //adding new media
                $medias[] = $request->get('media');
                foreach($medias[0] as $media){
                    $presentation->addMedia($this->entityManager->getRepository(Media::class)->find($media));
                }

            }

            $this->entityManager->flush();
            
            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Modify Presentation");
            $log->setModule("Presentation");
            $log->setUrl('/presentation');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return ' presentation '.$presentation->getTitre().' Modified successfully ';
        }

        return 'presentation was not found ';
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeletePresentation(int $id)
    {

        $presentation = $this->entityManager->getRepository(presentation::class)->find($id);

        if($presentation){
            $this->entityManager->remove($presentation);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Delete Presentation");
            $log->setModule("Presentation");
            $log->setUrl('/presentation');
            $this->entityManager->persist($log);
            $this->entityManager->flush();

            return 'presentation has been Deleted' ;
        }
            return 'presentation doesn\'t exist';
    }
    
}