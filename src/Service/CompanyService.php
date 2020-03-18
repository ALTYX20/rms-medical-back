<?php


namespace App\Service;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\CompanyServiceInterface;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

class CompanyService implements CompanyServiceInterface
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
        //return $this->entityManager->getRepository(Company::class)->find($id);
    }

    /**
     * @param Request $request
     */
    public function SetCompany(Request $request)
    {

        $serializer = new Serializer(array(new DateTimeNormalizer()));

        //if Company exist then cancel
        $company = $this->entityManager->getRepository(Company::class)->findOneBy(['email' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]')]);
        
        if($company){
            return 'comapny alredy exist';
        }

        //convert Date from String to DateTimeInterface object
        $companyPeriodSubscription = $serializer->denormalize($this->propertyAccessor->getValue($this->ConvertToArray($request), '[period_subscription]'), \DateTimeInterface::class);
        
        //Creat comapny 
        $company = new Company();
        $company->setName($this->propertyAccessor->getValue($this->ConvertToArray($request), '[name]'));
        $company->setEmail($this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]'));
        $company->setAdresse($this->propertyAccessor->getValue($this->ConvertToArray($request), '[adresse]'));
        $company->setNumtel($this->propertyAccessor->getValue($this->ConvertToArray($request), '[numtel]'));
        $company->setWebsite($this->propertyAccessor->getValue($this->ConvertToArray($request), '[website]'));
        $company->setStaffcount($this->propertyAccessor->getValue($this->ConvertToArray($request), '[staffcount]'));
        $company->setSector($this->propertyAccessor->getValue($this->ConvertToArray($request), '[sector]'));
        $company->setFile($this->propertyAccessor->getValue($this->ConvertToArray($request), '[file]'));
        $company->setActivity($this->propertyAccessor->getValue($this->ConvertToArray($request), '[activity]'));
        $company->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
        $company->setPeriodSubscription($companyPeriodSubscription);
        $company->setDatabasesize($this->propertyAccessor->getValue($this->ConvertToArray($request), '[databasesize]'));
        $company->setSlatype($this->propertyAccessor->getValue($this->ConvertToArray($request), '[slatype]'));
        $company->setSupporttype($this->propertyAccessor->getValue($this->ConvertToArray($request), '[supporttype]'));
        $company->setStatus($this->propertyAccessor->getValue($this->ConvertToArray($request), '[status]'));

        //Prepar and inject comapny into database
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        return 'Comapny Created successfully ';
        
    }

    /**
     * @param Request $request
     */
    public function DeleteCompany(Request $request)
    {   
        
        $companyID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $company = $this->entityManager->getRepository(Company::class)->find($companyID);
        if($company){
            $this->entityManager->remove($company);
            $this->entityManager->flush();
            return 'company has been Deleted' ;
        }
            return 'company dosn\'t exist';
    }

    /**
     * @param Request $request
     */
    public function ModifyCompany(Request $request)
    {
        $serializer = new Serializer(array(new DateTimeNormalizer()));
        $companyID =  $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $company = $this->entityManager->getRepository(Company::class)->find($companyID);
        if($company){
            $periodsubscriptionDate = $serializer->denormalize($this->propertyAccessor->getValue($this->ConvertToArray($request), '[period_subscription]'), \DateTime::class);
            $company->setName($this->propertyAccessor->getValue($this->ConvertToArray($request), '[name]'));
            $company->setEmail($this->propertyAccessor->getValue($this->ConvertToArray($request), '[email]'));
            $company->setAdresse($this->propertyAccessor->getValue($this->ConvertToArray($request), '[adresse]'));
            $company->setNumtel($this->propertyAccessor->getValue($this->ConvertToArray($request), '[numtel]'));
            $company->setWebsite($this->propertyAccessor->getValue($this->ConvertToArray($request), '[website]'));
            $company->setStaffcount($this->propertyAccessor->getValue($this->ConvertToArray($request), '[staffcount]'));
            $company->setSector($this->propertyAccessor->getValue($this->ConvertToArray($request), '[sector]'));
            $company->setFile($this->propertyAccessor->getValue($this->ConvertToArray($request), '[file]'));
            $company->setActivity($this->propertyAccessor->getValue($this->ConvertToArray($request), '[activity]'));
            $company->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
            $company->setPeriodSubscription($periodsubscriptionDate);
            $company->setDatabasesize($this->propertyAccessor->getValue($this->ConvertToArray($request), '[databasesize]'));
            $company->setSlatype($this->propertyAccessor->getValue($this->ConvertToArray($request), '[slatype]'));
            $company->setSupporttype($this->propertyAccessor->getValue($this->ConvertToArray($request), '[supporttype]'));
            $company->setStatus($this->propertyAccessor->getValue($this->ConvertToArray($request), '[status]'));
            $this->entityManager->flush($company);
            return $company;
        }
        return 'No Company found for id '.$companyID;
    }


    /**
     * @param Request $request
     */
    public function DisableCompany(Request $request){

        $companyID =  $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $company = $this->entityManager->getRepository(Company::class)->find($companyID);
        if($company){
            $company->setStatus(false);
            $this->entityManager->flush($company);
            return $company;
        }
        return 'No Company found for id '.$companyID;
    }
}