<?php


namespace App\Service;

use App\Entity\Referance;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ReferanceServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ReferanceService implements ReferanceServiceInterface
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
    function getAllReferance() {
        $referance = $this->entityManager->getRepository(Referance::class)->findAll();
        return $referance;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getReferanceById(int $id)
    {
        return $this->entityManager->getRepository(Referance::class)->find($id);
    }
}