<?php


namespace App\Service;

use App\Entity\Referance;
use App\Entity\Log;
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

        return $this->entityManager->createQueryBuilder()
            ->select('r.id , r.titre , r.description')
            ->from('App:Referance', 'r')
            ->getQuery()->getResult();
        /* $referance = $this->entityManager->getRepository(Referance::class)->findAll();
        return $referance; */
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
        //return $this->entityManager->getRepository(Referance::class)->find($id);
    }

    /**
     * @param Request $request
     */
    public function SetReferance(Request $request){

        $referance = $this->entityManager->getRepository(Referance::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($referance){
            return 'this referance already exist';
        }
        $referance = new Referance();
        $referance->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
        $referance->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
        
        //Prepar and inject product into database
        $this->entityManager->persist($referance);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new \DateTime('@'.strtotime('now')));
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
     */
    public function ModifyReferance(Request $request){

        $referance = $this->entityManager->getRepository(Referance::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($referance){

            $referance->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
            $referance->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('@'.strtotime('now')));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Add Referance");
            $log->setModule("Referance");
            $log->setUrl('/referance');
            $this->entityManager->persist($log);
            $this->entityManager->flush();

            return ' referance '.$referance->getTitre().' Modifed successfully ';
        }

        return 'referance was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function Deletereferance(Request $request){

        $referanceID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $referance = $this->entityManager->getRepository(Referance::class)->find($referanceID);
        if($referance){
            $this->entityManager->remove($referance);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('@'.strtotime('now')));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Add Referance");
            $log->setModule("Referance");
            $log->setUrl('/referance');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return 'presentation has been Deleted' ;
        }
            return 'presentation dosn\'t exist';
    }

}