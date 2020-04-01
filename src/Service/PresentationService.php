<?php


namespace App\Service;

use App\Entity\Presentation;
use App\Entity\Users; 
use App\Entity\Media;
use App\Entity\Referance;
use App\Entity\Project;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\PresentationServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class PresentationService implements PresentationServiceInterface
{
    private $entityManager;
    private $propertyAccessor;
    private $serializer;
    private $session;

    public function __construct(EntityManagerInterface $entityManager , SessionInterface $session)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
        $this->session = $session;

        $this->serializer = new Serializer(
            [new GetSetMethodNormalizer(), new ArrayDenormalizer()],
            [new JsonEncoder()]
        );
    }

    
    /**
     * @param Request $request
     * @return object[]
     */
    public function ConvertToArray(Request $request){

        // Getting Parameters from Json Request
        $parameters = [];
        if ($content = $request->getContent()) {
            $parameters = json_decode($content, true);
        }
        return $parameters;

    }

    /**
     * @return object[]
     */
    function getAllPresentation() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.territories , u.nom as presentationCreator  ')
            ->from('App:Presentation', 'p')
            ->join('p.presentationCreator' , 'u')
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
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetPresentation(Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($presentation){
            return 'this presentation already exist';
        }
        $presentation = new Presentation();
        $presentation->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
        $presentation->setTerritories($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]'));
        $presentation->setPresentationCreator($this->entityManager->getRepository(Users::class)->find("10"));

        $projects[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[project]');
        foreach($projects[0] as $project){
            $presentation->addProject($this->entityManager->getRepository(Project::class)->find($project));
        }

        
        if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]')){
            $referances = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]');
            foreach ($referances[0] as $referance){
                $presentation->addReferance($this->entityManager->getRepository(Referance::class)->find($referance));
            }
        }
        if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]')){
            $medias[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]');
            foreach ( $medias[0] as $media){
                $presentation->addMedia($this->entityManager->getRepository(Media::class)->find($media));
            }
        }
        //Prepare and inject Presentation into database
        $this->entityManager->persist($presentation);
        $this->entityManager->flush();
        
        //add to Log 
        $log = new Log();
        $log->setDate(new \DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
        $log->setAction("Add Presentation");
        $log->setModule("Presentation");
        $log->setUrl('/presentation');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'Presentation added successfully ';
    }


    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function ModifyPresentation(Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->findOneBy(['id' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[id]')]);
        if($presentation){

            $presentation->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
            $presentation->setTerritories($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]'));

            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[project]')){

                //remove all old related Project
                $projects[] = $presentation->getProject();
                foreach($projects[0] as $project){
                    $presentation->removeProject($project);
                }

                //adding new project
                /** @var Project $projects */
                $projects[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[project]');
                foreach($projects[0] as $project){
                    $presentation->addProject($this->entityManager->getRepository(Project::class)->find($project));
                }
            }


            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]')){
                //remove all Old references
                $referances[] = $presentation->getReferance();
                foreach($referances[0] as $referance){
                    $presentation->removeReferance($referance);
                }
                //adding new referances
                $referances[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]');
                foreach($referances[0] as $referance){
                    $presentation->addReferance($this->entityManager->getRepository(Referance::class)->find($referance));
                }

            }

            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]')){
                //remove all old Media
                $medias[] = $presentation->getMedia();
                foreach($medias[0] as $media){
                    $presentation->removeMedia($media);
                }
                //adding new media
                $medias[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]');
                foreach($medias[0] as $media){
                    $presentation->addMedia($this->entityManager->getRepository(Media::class)->find($media));
                }

            }

            $this->entityManager->flush($presentation);
            
            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function DeletePresentation(Request $request, int $id){

        if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[id]')) {
            $presentationID = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[id]');
            $presentation = $this->entityManager->getRepository(presentation::class)->find($presentationID);
        } else {
            $presentation = $this->entityManager->getRepository(presentation::class)->find($id);
        }
        if($presentation){
            $this->entityManager->remove($presentation);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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