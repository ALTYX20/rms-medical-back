<?php


namespace App\Service;

use App\Entity\Project;
use App\Entity\Presentation;
use App\Entity\Users;

use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProjectServiceInterface;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ProjectService implements ProjectServiceInterface
{
    private $entityManager;
    private $propertyAccessor;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
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
        $project = $this->entityManager->getRepository(Project::class)->findAll();
        return $project;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getProjectById(int $id)
    {
        return $this->entityManager->getRepository(Project::class)->find($id);
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
        $project->addProjectCreator($this->entityManager->getRepository(Users::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[project_creator]')));
        
        //Prepar and inject product into database
        $this->entityManager->persist($project);
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
            $project->addProjectCreator($this->entityManager->getRepository(Users::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[project_creator]')));
            
            $this->entityManager->flush();

            return 'project '.$project->getTitre().' Modifed successfully ';
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
            return 'project has been Deleted' ;
        }
            return 'project dosn\'t exist';
    }
    
}