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
use Symfony\Component\Serializer\Exception\ExceptionInterface as ExceptionInterfaceSerializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class UsersService implements UsersServiceInterface
{
    private $entityManager;
    private $Encoder;

    public function __construct(
        EntityManagerInterface $entityManager ,
        UserPasswordEncoderInterface $Encoder)
    {
        $this->entityManager = $entityManager;
        $this->Encoder = $Encoder;
    }



    /**
     * @return object[]
     */
    function getAllUsers() {

        return $this->entityManager->createQueryBuilder()
        ->select('u.id , u.nom, u.prenom , u.email , u.adresse , u.codepostal , u.city , u.numTel , u.roles , u.motpass , u.dateNaissance')
        ->from('App:Users', 'u')
        ->getQuery()->getResult(); 

    }



    /**
     * Get user with id
     * @param int $id
     * @return object|null
     */
    function getUsersById(int $id) 
    {

         return $this->entityManager->createQueryBuilder()
        ->select('u.id , u.nom , u.prenom , u.email , u.adresse , u.codepostal , u.city , u.numTel , u.roles , u.motpass , u.dateNaissance')
        ->from('App:Users', 'u')
        ->where('u.id = :id')
        ->setParameter('id', $id)
        ->getQuery()->getResult(); 

    }


    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public Function SetUser(Request $request)
    {

        $serializer = new Serializer(array(new DateTimeNormalizer()));

        //if user exist then cancel
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $request->get('email')]);
        
        if ($user ) { 
            return 'User already exist';
        }

        //convert Date from String to DateTimeInterface object
        try {
            $userDate = $serializer->denormalize($request->get('dateNaissance'), \DateTimeInterface::class);
        } catch (ExceptionInterfaceSerializer $e) {
        }

        //Create User 
        $user = new Users(
            $request->get('email]'),
            [$request->get('role')]
        );
        $user->setCompany($this->entityManager->getRepository(Company::class)->find($request->get('company')));
        $user->setNom($request->get('nom'));
            $user->setPrenom($request->get('prenom'));
            $user->setDateNaissance($userDate);
            $user->setEmail($request->get('email'));
            $user->setAdresse($request->get('adresse'));
            $user->setCodepostal($request->get('codepostal'));
            $user->setCity($request->get('city'));
            $user->setNumTel($request->get('numTel'));
            $user->setSexe($request->get('sexe'));
            $user->setRoles($request->get('role'));
            $user->setMotpass(
                $this->Encoder->encodePassword($user, $request->get('motpass')) 
            );
            
        //Prepare and inject user into database
        $this->entityManager->persist($user);
        $this->entityManager->flush();


        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($user);
        $log->setAction("Add User");
        $log->setModule("User");
        $log->setUrl('/user');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'User Created successfully ';
        
    }


    /**
     * @param Request $request
     * @return array|string
     * @throws Exception
     */
    public Function UserExist(Request $request)
    {

        //getting User from database
        $user = $this->entityManager->getRepository(Users::class)->findOneBy(['email' => $request->get('email')]);

        // if User exist in database check Password
        if ($user ) {

            if ($user->getMotpass() == $request->get('motpass') ) {


                //add to Log 
                $log = new Log();
                $log->setDate(new DateTime('now'));
                $log->setUser($user);// after will get user id from session
                $log->setAction("Login");
                $log->setModule("User");
                $log->setUrl('/Login');
                $this->entityManager->persist($log);
                $this->entityManager->flush();
                /* return ['token' => $this->JWTManager->create($user->createFromPayload($user->getEmail(), ['roles' => $user->getRoles()])),
                        'RefreshToken' => $this->RefreshToken($user) 
            ];*/
                return [$user->getId(),$user->getNom(),$user->getRoles()];
            }
            return 'password incorrect';

        }

        return 'user doesn\'t exist';

    }



    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeleteUser( int $id)
    {
        $user = $this->entityManager->getRepository(Users::class)->find($id);
        if($user){
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10")); // after will get user id from session
            $log->setAction("Delete User");
            $log->setModule("User");
            $log->setUrl('/user');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 

            return 'user has been Deleted' ;
        }
            return 'user doesn\'t exist';
    }

    /**
     * @param Request $request
     * @param int $id
     * @return object|string|null
     * @throws Exception
     */
    public function ModifyUser(int $id,Request $request)
    {
        $serializer = new Serializer(array(new DateTimeNormalizer()));
        $user = $this->entityManager->getRepository(Users::class)->find($id);
        try {
            $userDate = $serializer->denormalize($request->get('dateNaissance'), DateTime::class);
        } catch (ExceptionInterfaceSerializer $e) {
        }
        if($user){

            $user->setNom($request->get('nom'));
            $user->setPrenom($request->get('prenom'));
            $user->setDateNaissance($userDate);
            $user->setEmail($request->get('email'));
            $user->setAdresse($request->get('adresse'));
            $user->setCodepostal($request->get('codepostal'));
            $user->setCity($request->get('city'));
            $user->setNumTel($request->get('numTel'));
            $user->setSexe($request->get('sexe'));
            $user->setRoles($request->get('role'));
            $user->setMotpass(
                $this->Encoder->encodePassword($user, $request->get('motpass')) 
            );
            
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Modify User");
            $log->setModule("User");
            $log->setUrl('/user');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 
            //return $user;
            return 'User Modified successfully';
        }
        return 'No user found with id '.$id;
    }

    /**
     * @param string $role
     * @param int $id
     */
    public Function ChangeRole(int $id , string $role){

        $user = $this->entityManager->getRepository(Users::class)->find($id);
        $user->setRole($role);

    }

}

