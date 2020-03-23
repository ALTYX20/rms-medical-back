<?php


namespace App\Service;

use App\Entity\Log;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\LogServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

class LogService implements LogServiceInterface
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
    public function getAllLogs() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('l.id , l.date , l.action , l.module , l.url , u.id as UserID')
            ->from('App:Log', 'l')
            ->join('l.user', 'u')
            ->getQuery()->getResult();

    }



    /**
     * @param int $id
     * @return object|null
     */
    public function getUserLog(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('l.id , l.date , l.action , l.module , l.url , u.id as UserID')
            ->from('App:Log', 'l')
            ->join('l.user','u')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()->getResult();
        
    }
}