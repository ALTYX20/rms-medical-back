<?php


namespace App\Service;

use App\Entity\Referance;
use App\Entity\Log;
use App\Entity\Users;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ReferanceServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ReferanceService implements ReferanceServiceInterface
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
    function getAllReferance() {

        return $this->entityManager->createQueryBuilder()
            ->select('r.id , r.titre , r.description')
            ->from('App:Referance', 'r')
            ->where('r.company = :company')
            ->setParameter('company', $this->getUser()->getCompany())
            ->getQuery()->getResult();

    }



    /**
     * @param int $id
     * @return object|null
     */
    function getReferanceById(int $id)
    {

        return $this->entityManager->createQueryBuilder()
            ->select('r.id , r.titre , r.description')
            ->from('App:Referance', 'r')
            ->where('r.id = :id')
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


    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetReferance(Request $request)
    {
        $referance = new Referance();
        $referance->setTitre($request->get('titre'));
        $referance->setDescription($request->get('description'));
        $referance->setCompany($this->getUser()->getCompany());
        
        //Prepar and inject product into database
        $this->entityManager->persist($referance);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->getUser());
        $log->setCompany($this->getUser()->getCompany());
        $log->setAction("Add Referance");
        $log->setModule("Referance");
        $log->setUrl('/referance');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'referance added successfully ';
    }


    /**
     * @param Request $request
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function ModifyReferance(int $id,Request $request){

        $referance = $this->entityManager->getRepository(Referance::class)->find($id);
        if($referance){

            $referance->setTitre($request->get('titre'));
            $referance->setDescription($request->get('description'));
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Add Referance");
            $log->setModule("Referance");
            $log->setUrl('/referance');
            $this->entityManager->persist($log);
            $this->entityManager->flush();

            return ' referance '.$referance->getTitre().' Modified successfully ';
        }

        return 'referance was not found ';
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeleteReferance(int $id)
    {
        $referance = $this->entityManager->getRepository(Referance::class)->find($id);
        if($referance){
            $this->entityManager->remove($referance);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Add Referance");
            $log->setModule("Referance");
            $log->setUrl('/referance');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return 'reference has been Deleted' ;
        }
            return 'reference doesn\'t exist';
    }

}