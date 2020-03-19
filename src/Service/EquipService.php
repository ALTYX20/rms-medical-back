<?php


namespace App\Service;

use App\Entity\Equip;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\EquipServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

class EquipService implements EquipServiceInterface
{
    private $entityManager;
    private $propertyAccessor;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

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
    public function getAllEquip() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('l.id , l.date , u.id , l.action , l.module , l.url')
            ->from('App:Equip', 'e')
            ->join('e.leader', 'u')
            ->getQuery()->getResult();

    }



    /**
     * @param int $id
     * @return object|null
     */
    public function getEquipById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('l.id , l.date , u.id , l.action , l.module , l.url')
            ->from('App:Equip', 'e')
            ->join('e.leader','l')
            ->where('e.id = :id')
            ->setParameter('id', $id)
            ->getQuery()->getResult();
        
    }
}