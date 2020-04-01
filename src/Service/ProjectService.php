<?php


namespace App\Service;

use App\Entity\Project;
use App\Entity\Presentation;
use App\Entity\Users;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProjectServiceInterface;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProjectService implements ProjectServiceInterface
{
    private $entityManager;
    private $propertyAccessor;
    private $session;

    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
        $this->session = $session;
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
    function getAllProject() {
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.logo , p.status , p.territories')
            ->from('App:Project', 'p')
            ->getQuery()->getResult();

    }



    /**
     * @param int $id
     * @return object|null
     */
    function getProjectById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.logo , p.status , p.territories')
            ->from('App:Project', 'p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()->getResult();
        //return $this->entityManager->getRepository(Project::class)->find($id);
    }


    /**
     * @param Request $request
     */
    public function SetProject(Request $request){
        $project = $this->entityManager->getRepository(Project::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($project){
            return 'this project already exist';
        }
        $project = new Project();
        $project->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
        $project->setLogo($this->propertyAccessor->getValue($this->ConvertToArray($request), '[logo]'));
        $project->setStatus($this->propertyAccessor->getValue($this->ConvertToArray($request), '[status]'));
        $project->setTerritories($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]'));
        if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[presentation]')){
            $project->addPresentation($this->entityManager->getRepository(Presentation::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[presentation]')));
        }
        $project->addProjectCreator($this->entityManager->getRepository(Users::class)->find("10"));
        
        //Prepar and inject product into database
        $this->entityManager->persist($project);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new \DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));
        $log->setAction("Add Project");
        $log->setModule("Project");
        $log->setUrl('/project');
        $this->entityManager->persist($log);
        $this->entityManager->flush(); 

        return 'project added successfully ';
    }


    /**
     * @param Request $request
     */
    public function ModifyProject(Request $request){

        $project = $this->entityManager->getRepository(Project::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($project){

            $project->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
            $project->setLogo($this->propertyAccessor->getValue($this->ConvertToArray($request), '[logo]'));
            $project->setStatus($this->propertyAccessor->getValue($this->ConvertToArray($request), '[status]'));
            $project->setTerritories($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]'));
            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[presentation]')){
                $project->addPresentation($this->entityManager->getRepository(Presentation::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[presentation]')));
            }
            
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Modify Project");
            $log->setModule("Project");
            $log->setUrl('/project');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 

            return 'project '.$project->getTitre().' Modified successfully ';
        }

        return 'project was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function DeleteProject(Request $request){

        $projectID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $project = $this->entityManager->getRepository(Project::class)->find($projectID);
        if($project){
            $this->entityManager->remove($project);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Delete Project");
            $log->setModule("Project");
            $log->setUrl('/project');
            $this->entityManager->persist($log);
            $this->entityManager->flush();

            return 'project has been Deleted' ;
        }
            return 'project doesn\'t exist';
    }
    
}