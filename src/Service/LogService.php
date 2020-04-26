<?php


namespace App\Service;

use App\Entity\Log;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\LogServiceInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class LogService implements LogServiceInterface
{
    private $entityManager;
    private $tokenStorage;

    public function __construct(
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage )
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return object[]
     */
    public function getAllLogs() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('l.id , l.date , l.action , l.module , l.url , u.id as UserID')
            ->from('App:Log', 'l')
            ->join('l.user', 'u')
             ->where('l.company = :company')
            ->setParameter('company', $this->getUser()->getCompany()) 
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

}