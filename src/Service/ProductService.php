<?php


namespace App\Service;

use App\Entity\Product;
use App\Entity\Project;
use App\Entity\Log;
use App\Entity\Users;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProductServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;







class ProductService implements ProductServiceInterface
{
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }



    /**
     * @return object[]
     */
    function getAllProduct() {

        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.nom , p.logo , p.type , p.prix , p.description')
            ->from('App:Product', 'p')
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
     * @param Request $request
     * @return string
     * @throws Exception
     */
    public function SetProduct(Request $request){
        
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['nom' => $request->get('nom')]);
        if($product){
            return 'this product already exist';
        }
        $product = new Product();
        $product->setNom($request->get('nom'));
        $product->setLogo($request->get('logo'));
        $product->setPrix($request->get('prix'));
        $product->setType($request->get('type'));
        $product->setDescription($request->get('description'));
        $product->setProject($this->entityManager->getRepository(Project::class)->find($request->get('project')));
        
        //Prepare and inject product into database
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));//$this->session->get("CurrentUser")));// after will get user id from session
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
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
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