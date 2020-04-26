<?php


namespace App\Service;

use App\Entity\Company;
use App\Entity\Log;
use App\Entity\Users;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\CompanyServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class CompanyService implements CompanyServiceInterface
{
    private $entityManager;
    private $propertyAccessor;
    private $mailer;
    private $Encoder;
    private $tokenStorage;

    public function __construct(
        EntityManagerInterface $entityManager,
         MailerInterface $mailer ,
         UserPasswordEncoderInterface $Encoder ,
         TokenStorageInterface $tokenStorage )
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
        $this->mailer = $mailer;
        $this->Encoder = $Encoder;
        $this->tokenStorage = $tokenStorage;
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
     * @return object[]
     */
    function getAllCompanys() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('c.id , c.name , c.email , c.adresse , c.numtel , c.website , c.staffcount , c.sector , c.activity , c.description , c.periodSubscription , c.databasesize , c.slatype , c.supporttype , c.status')
            ->from('App:Company', 'c')
            ->getQuery()->getResult();
    }


    /**
     * @param int $id
     * @return object|null
     */
    function getCompanyById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('c.id , c.name , c.email , c.adresse , c.numtel , c.website , c.staffcount , c.sector , c.activity , c.description , c.periodSubscription , c.databasesize , c.slatype , c.supporttype , c.status')
            ->from('App:Company', 'c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()->getResult();

    }

    /**
     * @param Request $request
     * @return array|string
     * @throws ExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function SetCompany(Request $request)
    {

        $serializer = new Serializer(array(new DateTimeNormalizer()));

        //if Company exist then cancel
        $company = $this->entityManager->getRepository(Company::class)->findOneBy(['email' => $request->get('email')]);
        
        if($company){
            return 'company already exist';
        }

        //convert Date from String to DateTimeInterface object
        $companyPeriodSubscription = $serializer->denormalize($request->get('period_subscription'), \DateTimeInterface::class);
        
        //Create company 
        $company = new Company();
        $company->setName($request->get('name'));
        $company->setEmail($request->get('email'));
        $company->setAdresse($request->get('adresse'));
        $company->setNumtel($request->get('numtel'));
        $company->setWebsite($request->get('website'));
        $company->setStaffcount($request->get('staffcount'));
        $company->setSector($request->get('sector'));
        $company->setFile($request->get('file'));
        $company->setActivity($request->get('activity'));
        $company->setDescription($request->get('description'));
        $company->setPeriodSubscription($companyPeriodSubscription);
        $company->setDatabasesize($request->get('databasesize'));
        $company->setSlatype($request->get('slatype'));
        $company->setSupporttype($request->get('supporttype'));
        $company->setStatus($request->get('status'));


        

        //Prepare and inject company into database
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        if($request->get('employee')){
            $this->InviteEmployee($request->get('employee'), $company->getId(), $company->getName());
        }

        //Create User 
        $user = new Users(
            $request->get('email'),
            ["ROLE_ADMIN"]
        );
        $user->setCompany($company);
        $user->setNom($request->get('name'));
        $user->setPrenom('Company');
        $user->setDateNaissance(new DateTime('now'));
        $user->setAdresse($request->get('adresse'));
        $user->setCodepostal($request->get('codepostal'));
        $user->setCity($request->get('city')); 
        $user->setSexe('Homme');
        $user->setNumTel($request->get('numtel'));
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
        $log->setCompany($user->getCompany());
        $log->setAction("Add Company");
        $log->setModule("Company");
        $log->setUrl('/company');
        $this->entityManager->persist($log);
        $this->entityManager->flush(); 

        return 'added company';
        
    }

    /**
     * Function that Send emails contains inscription link with company id and user role
     * @param array employees
     * @param int $companyId
     * @param string $companyName
     * @throws TransportExceptionInterface
     */
    public function InviteEmployee(array $employee, int $companyId, string $companyName)
    {
        
        $admins[] = $employee[0];
        $managers[] = $employee[1];
        $editors[] = $employee[2];
        $viewers[] = $employee[3];
        foreach ($admins as $admin) {
            //Mailer
            $email = (new Email())
                ->from('altyx@example.com')
                ->to($admin[0])
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject($companyName.' want to add you in RMS platform')
                 /* ->text('Sending emails is fun again!
                        Register yourself in RMS platform whit the Link Below:
                        https://www.site.tn/'.$companyId.'/add/admin
                        ')  */
                ->html('<p>Sending emails is fun again!</p>
                        <p>Register yourself in RMS platform whit the Link Below:</p>
                        <a href = "www.altyx.io">https://www.RMSsite.tn/'.$companyId.'/add/admin</a>
                        <p>and add your credentials </p>
                        '); 

            $sentEmail = $this->mailer->send($email);
        }
        foreach ($managers as $manager) {
            $email = (new Email())
                ->from('altyx@example.com')
                ->to($manager[0])
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject($companyName.' want to add you in RMS platform')
                /* ->text('Sending emails is fun again!
                       Register yourself in RMS platform whit the Link Below:
                       https://www.site.tn/'.$companyId.'/add/admin
                       ')  */
                ->html('<p>Sending emails is fun again!</p>
                        <p>Register yourself in RMS platform whit the Link Below:</p>
                        <a href = "www.altyx.io">https://www.RMSsite.tn/'.$companyId.'/add/manager</a>
                        <p>and add your credentials </p>
                        ');

            $sentEmail = $this->mailer->send($email);
            }
        foreach ($editors as $editor) {
            $email = (new Email())
                ->from('altyx@example.com')
                ->to($editor[0])
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject($companyName.' want to add you in RMS platform')
                /* ->text('Sending emails is fun again!
                       Register yourself in RMS platform whit the Link Below:
                       https://www.site.tn/'.$companyId.'/add/admin
                       ')  */
                ->html('<p>Sending emails is fun again!</p>
                        <p>Register yourself in RMS platform whit the Link Below:</p>
                        <a href = "www.altyx.io">https://www.RMSsite.tn/'.$companyId.'/add/editor</a>
                        <p>and add your credentials </p>
                        ');

            $sentEmail = $this->mailer->send($email);
            }
        foreach ($viewers as $viewer) {
            $email = (new Email())
                ->from('altyx@example.com')
                ->to($viewer[0])
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject($companyName.' want to add you in RMS platform')
                /* ->text('Sending emails is fun again!
                       Register yourself in RMS platform whit the Link Below:
                       https://www.site.tn/'.$companyId.'/add/admin
                       ')  */
                ->html('<p>Sending emails is fun again!</p>
                        <p>Register yourself in RMS platform whit the Link Below:</p>
                        <a href = "www.altyx.io">https://www.RMSsite.tn/'.$companyId.'/add/viewer</a>
                        <p>and add your credentials </p>
                        ');

            $sentEmail = $this->mailer->send($email);
        }
        
        
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeleteCompany(int $id)
    {   

        $company = $this->entityManager->getRepository(Company::class)->find($id);
        if($company){
            $this->entityManager->remove($company);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Delete Company");
            $log->setModule("Company");
            $log->setUrl('/company');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return 'company has been Deleted' ;
        }
            return 'company doesn\'t exist';
    }

    /**
     * @param int $id
     * @param Request $request
     * @return string
     * @throws ExceptionInterface
     */
    public function ModifyCompany(int $id, Request $request)
    {
        $serializer = new Serializer(array(new DateTimeNormalizer()));
        $company = $this->entityManager->getRepository(Company::class)->find($id);
        if($company){
            $periodsubscriptionDate = $serializer->denormalize($request->get('period_subscription'), DateTime::class);
            $company->setName($request->get('name'));
            $company->setEmail($request->get('email'));
            $company->setAdresse($request->get('adresse'));
            $company->setNumtel($request->get('numtel'));
            $company->setWebsite($request->get('website'));
            $company->setStaffcount($request->get('staffcount'));
            $company->setSector($request->get('sector'));
            $company->setFile($request->get('file'));
            $company->setActivity($request->get('activity'));
            $company->setDescription($request->get('description'));
            $company->setPeriodSubscription($periodsubscriptionDate);
            $company->setDatabasesize($request->get('databasesize'));
            $company->setSlatype($request->get('slatype'));
            $company->setSupporttype($request->get('supporttype'));
            $company->setStatus($request->get('status'));
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Modify Company");
            $log->setModule("Company");
            $log->setUrl('/company');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return 'Company Modified successfully ';
        }
        return 'No Company found for id '.$id;
    }


    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function DisableCompany(Request $request){

        $companyID =  $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $company = $this->entityManager->getRepository(Company::class)->find($companyID);
        if($company){
            $company->setStatus(false);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Disable Company");
            $log->setModule("Company");
            $log->setUrl('/company');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return 'Company has been Disabled';
        }
        return 'No Company found for id '.$companyID;
    }
}