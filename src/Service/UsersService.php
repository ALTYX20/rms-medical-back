<?php


namespace App\Service;

use App\Entity\Users;
use App\Entity\Company; 
use App\Entity\Log;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\UsersServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Exception\ExceptionInterface as ExceptionInterfaceSerializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use phpDocumentor\Reflection\Types\Boolean;

class UsersService implements UsersServiceInterface 
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
    function getAllUsers() {

        return $this->entityManager->createQueryBuilder()
        ->select('u.id, u.nom, u.prenom , u.email , u.adresse , u.codepostal , u.city , u.numTel , u.role , u.motpass , u.dateNaissance')
        ->from('App:Users', 'u')
        ->getQuery()->getResult(); 

        //$Userss = $this->entityManager->getRepository(Users::class)->findAll();
        //return $Userss;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getUsersById(int $id) 
    {

         return $this->entityManager->createQueryBuilder()
        ->select('u.id, u.nom, u.prenom , u.email , u.adresse , u.codepostal , u.city , u.numTel , u.role , u.motpass , u.dateNaissance')
        ->from('App:Users', 'u')
        ->where('u.id = :id')
        ->setParameter('id', $id)
        ->getQuery()->getResult(); 

        //return $this->entityManager->getRepository(Users::class)->show($id);
    }


    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetUser(Request $request)
    {

        $serializer = new Serializer(array(new DateTimeNormalizer()));

        //if user exist then cancel
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]')]);
        
        if($user){
            return 'User alredy exist';
        }

        //convert Date from String to DateTimeInterface object
        try {
            $userDate = $serializer->denormalize($this->propertyAccessor->getValue($this->ConvertToArray($request), '[dateNaissance]'), \DateTimeInterface::class);
        } catch (ExceptionInterfaceSerializer $e) {
        }

        //Creat User 
        $user = new Users();
        $user->setCompany($this->entityManager->getRepository(Company::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[company]')));
        $user->setNom($this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]'));
        $user->setPrenom($this->propertyAccessor->getValue($this->ConvertToArray($request), '[prenom]'));
        /** @var DateTime $userDate */
        $user->setDateNaissance($userDate);
        $user->setEmail($this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]'));
        $user->setAdresse($this->propertyAccessor->getValue($this->ConvertToArray($request), '[adresse]'));
        $user->setCodepostal($this->propertyAccessor->getValue($this->ConvertToArray($request), '[codepostal]'));
        $user->setCity($this->propertyAccessor->getValue($this->ConvertToArray($request), '[city]'));
        $user->setNumTel($this->propertyAccessor->getValue($this->ConvertToArray($request), '[numTel]'));
        $user->setSexe($this->propertyAccessor->getValue($this->ConvertToArray($request), '[sexe]'));
        $user->setRole($this->propertyAccessor->getValue($this->ConvertToArray($request), '[role]'));
        $user->setMotpass($this->propertyAccessor->getValue($this->ConvertToArray($request), '[motpass]'));
        
        //Prepar and inject user into database
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("9"));// after will get user id from session
        $log->setAction("Add User");
        $log->setModule("User");
        $log->setUrl('/user');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'User Created successfully ';
        
    }


    /**
     * @param Request $request
     * @return object|string|null
     * @throws Exception
     */
    public function UserExist(Request $request)
    {

        //getting User from database
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]')]);
        
        /*  will use it to config Sessions after

            $request->getSession()->set(
            Security::LAST_USERNAME,
            $propertyAccessor->getValue($this->ConvertToArray($request), '[email]')
        ); */

        // if User exist in database check Password
        if($user){
            if($user->getMotpass() == $this->propertyAccessor->getValue($this->ConvertToArray($request), '[motpass]') ){
                
                //add to Log 
                $log = new Log();
                $log->setDate(new DateTime('now'));
                $log->setUser($user);// after will get user id from session
                $log->setAction("Login");
                $log->setModule("User");
                $log->setUrl('/Login');
                $this->entityManager->persist($log);
                $this->entityManager->flush(); 
                return $user;
            }
            return 'password incorrect';
        }

        return 'user dosent exist';

    }


    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function DeleteUser(Request $request, int $id)
    {
        if($this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]')){
            $userID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
            $user = $this->entityManager->getRepository(Users::class)->find($userID); 
        }else{
            $user = $this->entityManager->getRepository(Users::class)->find($id);
        }
        if($user){
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("9"));// after will get user id from session
            $log->setAction("Delete User");
            $log->setModule("User");
            $log->setUrl('/user');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 

            return 'user has been Deleted' ;
        }
            return 'user dosn\'t exist';
    }

    /**
     * @param Request $request
     * @return object|string|null
     * @throws Exception
     */
    public function ModifyUser(Request $request)
    {
        $serializer = new Serializer(array(new DateTimeNormalizer()));
        $userID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $user = $this->entityManager->getRepository(Users::class)->find($userID);
        try {
            $userDate = $serializer->denormalize($this->propertyAccessor->getValue($this->ConvertToArray($request), '[dateNaissance]'), DateTime::class);
        } catch (ExceptionInterfaceSerializer $e) {
        }
        if($user){
            $user->setNom($this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]'));
            $user->setPrenom($this->propertyAccessor->getValue($this->ConvertToArray($request), '[prenom]'));
            $user->setDateNaissance($userDate);
            $user->setEmail($this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]'));
            $user->setAdresse($this->propertyAccessor->getValue($this->ConvertToArray($request), '[adresse]'));
            $user->setCodepostal($this->propertyAccessor->getValue($this->ConvertToArray($request), '[codepostal]'));
            $user->setCity($this->propertyAccessor->getValue($this->ConvertToArray($request), '[city]'));
            $user->setNumTel($this->propertyAccessor->getValue($this->ConvertToArray($request), '[numTel]'));
            $user->setSexe($this->propertyAccessor->getValue($this->ConvertToArray($request), '[sexe]'));
            $user->setRole($this->propertyAccessor->getValue($this->ConvertToArray($request), '[role]'));
            $user->setMotpass($this->propertyAccessor->getValue($this->ConvertToArray($request), '[motpass]'));
            $this->entityManager->flush($user);

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("9"));// after will get user id from session
            $log->setAction("Modify User");
            $log->setModule("User");
            $log->setUrl('/user');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 
            return $user;
        }
        return 'No product found for id '.$userID;
    }
}