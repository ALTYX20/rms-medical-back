<?php


namespace App\Service;

use App\Entity\Equip;
use App\Entity\Users;
use App\Entity\Company;
use App\Entity\Log;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\EquipServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;


class EquipService implements EquipServiceInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return object[]
     */
    public function getAllEquip() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('e.id as num_equip , c.name as Company_name')
            ->from('App:Equip', 'e')
            ->join('e.company' , 'c')
            ->getQuery()->getResult();

    }



    /**
     * @param int $id
     * @return object|null
     */
    public function getEquipById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('e.id as num_equip , c.name as Company_name')
            ->from('App:Equip', 'e')
            ->join('e.company' , 'c')
            ->where('e.id = :id')
            ->setparameter('id' , $id)
            ->getQuery()->getResult();
        
    }

    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetEquip(Request $request){

         $equip = $this->entityManager->getRepository(Equip::class)->findOneBy(['leader' => $request->get('leader')]);
        if($equip){
            return 'this equip already exist';
        } 
        $equip = new Equip();

        $equip->setCompany($this->entityManager->getRepository(Company::class)->find($request->get('company')));
        
        $leader = $this->entityManager->getRepository(Users::class)->find($request->get('leader'));
        
        if($equip->getCompany() === $leader->getCompany()){
            $equip->addLeader($leader);
        }

        $members[] = $request->get('members');
        foreach($members[0] as $member){
            
            $addmember = $this->entityManager->getRepository(Users::class)->find($member);
            if($equip->getCompany() === $addmember->getCompany()){
                $equip->addMember($addmember);
            }
            
           //$equip->addMember($this->entityManager->getRepository(Users::class)->find($member));
        }


        //Prepare and inject Presentation into database
        $this->entityManager->persist($equip);
        $this->entityManager->flush();
        
        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
        $log->setAction("Add Equip");
        $log->setModule("Equip");
        $log->setUrl('/Equip');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'equip is set';
    }

    /**
     * @param Request $request
     * @param int $id
     * @return string
     */
    public function AddMembers(Request $request , int $id)
    {
        $equip = $this->entityManager->getRepository(Equip::class)->find($id);
        $members[] = $request->get('members');
        foreach($members[0] as $member){

            $addmember = $this->entityManager->getRepository(Users::class)->find($member);
            if($equip->getCompany() === $addmember->getCompany()){
                $equip->addMember($addmember);
            }
            //$equip->addMember($this->entityManager->getRepository(Users::class)->find($member));
        }
        $this->entityManager->flush();
        return 'member added';

    }

    /**
     * @param Request $request
     * @param int $id
     * @return string
     */
    public function RemoveMembers(Request $request , int $id)
    {
        $equip = $this->entityManager->getRepository(Equip::class)->find($id);
        $members[] = $request->get('members');
        foreach($members[0] as $member){
            $equip->removeMember($this->entityManager->getRepository(Users::class)->find($member));
        }
        $this->entityManager->flush();
        return 'member removed';
    }

    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeleteEquip(int $id)
    {
        $equip = $this->entityManager->getRepository(Equip::class)->find($id);
        if($equip){
            $this->entityManager->remove($equip);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Delete Equip");
            $log->setModule("Equip");
            $log->setUrl('/equip');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 
            return 'equip has been Deleted' ;
        }
            return 'equip doesn\'t exist';

    }


    /**
     * @param int $id
     * @return mixed
     */
    public function ShowMembers(int $id){

        
        return $this->entityManager->createQueryBuilder()
            ->select('m.id as memberId , m.nom as memberName')
            ->from('App:Equip', 'e')
            ->join('e.member' , 'm')
            ->join('e.company' , 'c')
            ->where('c.id = m.company and e.id = m.equip and e.id = :id')
            ->setparameter('id' , $id)
            ->getQuery()->getResult(); 


    }
    

        
}