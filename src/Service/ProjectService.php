<?php


namespace App\Service;

use App\Entity\Project;
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
    
}