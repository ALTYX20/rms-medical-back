<?php


namespace App\Service;

use App\Entity\Presentation;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\PresentationServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

class PresentationService implements PresentationServiceInterface
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
    function getAllPresentation() {
        $presentation = $this->entityManager->getRepository(Presentation::class)->findAll();
        return $presentation;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getPresentationById(int $id)
    {
        return $this->entityManager->getRepository(Presentation::class)->find($id);
    }
    
}