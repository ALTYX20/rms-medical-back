<?php


namespace App\Service;

use App\Entity\Product;
use App\Entity\Project;
use App\Entity\Company;
use App\Entity\Log;
use App\Entity\Users;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProductServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class ProductService implements ProductServiceInterface
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
    function getAllProduct() {

        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.nom , p.logo , p.type , p.prix , p.description')
            ->from('App:Product', 'p')
            ->where('p.company = :company')
            ->setParameter('company', $this->getUser()->getCompany())
            ->getQuery()->getResult();
            
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getProductById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.nom , p.logo , p.type , p.prix , p.description')
            ->from('App:Product', 'p')
            ->where('p.id = :id')
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
    public function SetProduct(Request $request){
        
        $product = new Product();
        $product->setNom($request->get('nom'));
        $product->setLogo($request->get('logo'));
        $product->setPrix($request->get('prix'));
        $product->setType($request->get('type'));
        $product->setDescription($request->get('description'));
        $product->setProject($this->entityManager->getRepository(Project::class)->find($request->get('project')));
        $product->setCompany($this->getUser()->getCompany());

        //Prepare and inject product into database
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->getUser());
        $log->setCompany($this->getUser()->getCompany());
        $log->setAction("Add Product");
        $log->setModule("Product");
        $log->setUrl('/product');
        $this->entityManager->persist($log);
        $this->entityManager->flush(); 

        return 'Product added successfully ';
    }


    /**
     * @param Request $request
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function ModifyProduct(int $id,Request $request){

        $product = $this->entityManager->getRepository(Product::class)->find($id);
        if($product){

            $product->setNom($request->get('nom'));
            $product->setType($request->get('type'));
            $product->setLogo($request->get('logo'));
            $product->setPrix($request->get('prix'));
            $product->setDescription($request->get('description'));
        
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Modify Product");
            $log->setModule("Product");
            $log->setUrl('/product');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 

            return 'Product '.$product->getNom().' Modified successfully ';
        }

        return 'Product was not found ';
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function DeleteProduct(int $id)
    {
        $product = $this->entityManager->getRepository(Product::class)->find($id);
        if($product){
            $this->entityManager->remove($product);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
            $log->setUser($this->getUser());
            $log->setCompany($this->getUser()->getCompany());
            $log->setAction("Delete Product");
            $log->setModule("Product");
            $log->setUrl('/product');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 
            return 'product has been Deleted' ;
        }
            return 'product doesn\'t exist';
    }
    
}