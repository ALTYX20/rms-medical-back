<?php


namespace App\Service;

use App\Entity\Project;
use App\Entity\Presentation;
use App\Entity\Users;
use App\Entity\Log;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProjectServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;



class ProjectService implements ProjectServiceInterface
{
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

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
     * @return string
     * @throws Exception
     */
    public function SetProject(Request $request){
        $project = $this->entityManager->getRepository(Project::class)->findOneBy(['titre' => $request->get('titre')]);
        if($project){
            return 'this project already exist';
        }
        $project = new Project();
        $project->setTitre($request->get('titre'));
        $project->setLogo($request->get('logo'));
        $project->setStatus($request->get('status'));
        $project->setTerritories($request->get('territories'));
        if($request->get('presentation')){
            $project->addPresentation($this->entityManager->getRepository(Presentation::class)->find($request->get('presentation')));
        }
        $project->addProjectCreator($this->entityManager->getRepository(Users::class)->find("10"));
        
        //Prepar and inject product into database
        $this->entityManager->persist($project);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
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
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function ModifyProject(int $id, Request $request){

        $project = $this->entityManager->getRepository(Project::class)->find($id);
        if($project){

            $project->setTitre($request->get('titre'));
            $project->setLogo($request->get('logo'));
            $project->setStatus($request->get('status'));
            $project->setTerritories($request->get('territories'));
            if($request->get('presentation')){
                $project->addPresentation($this->entityManager->getRepository(Presentation::class)->find($request->get('presentation')));
            }
            
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
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
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeleteProject(int $id)
    {
        $project = $this->entityManager->getRepository(Project::class)->find($id);
        if($project){
            $this->entityManager->remove($project);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
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