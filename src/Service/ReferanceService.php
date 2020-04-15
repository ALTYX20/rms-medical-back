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


class ReferanceService implements ReferanceServiceInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    


    /**
     * @return object[]
     */
    function getAllReferance() {

        return $this->entityManager->createQueryBuilder()
            ->select('r.id , r.titre , r.description')
            ->from('App:Referance', 'r')
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
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetReferance(Request $request){

        $referance = $this->entityManager->getRepository(Referance::class)->findOneBy(['titre' => $request->get('titre')]);
        if($referance){
            return 'this referance already exist';
        }
        $referance = new Referance();
        $referance->setTitre($request->get('titre'));
        $referance->setDescription($request->get('description'));
        
        //Prepar and inject product into database
        $this->entityManager->persist($referance);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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