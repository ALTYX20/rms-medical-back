<?php


namespace App\Service;

use App\Entity\Product;
use App\Entity\log;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProductServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Serializer;

class ProductService implements ProductServiceInterface
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
        //return $this->entityManager->getRepository(Product::class)->find($id);
    }


    /**
     * @param Request $request
     */
    public function SetProduct(Request $request){
        
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['nom' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]')]);
        if($product){
            return 'this product already exist';
        }
        $product = new Product();
        $product->setNom($this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]'));
        $product->setLogo($this->propertyAccessor->getValue($this->ConvertToArray($request), '[logo]'));
        $product->setPrix($this->propertyAccessor->getValue($this->ConvertToArray($request), '[prix]'));
        $product->setType($this->propertyAccessor->getValue($this->ConvertToArray($request), '[type]'));
        $product->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
        
        //Prepar and inject product into database
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new \DateTime('@'.strtotime('now')));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
        $log->setAction("Add Product");
        $log->setModule("Product");
        $log->setUrl('/product');
        $this->entityManager->persist($log);
        $this->entityManager->flush(); 

        return 'Product added successfully ';
    }



    /**
     * @param Request $request
     */
    public function ModifyProduct(Request $request){

        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['nom' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]')]);
        if($product){

            $product->setNom($this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]'));
            $product->setType($this->propertyAccessor->getValue($this->ConvertToArray($request), '[type]'));
            $product->setLogo($this->propertyAccessor->getValue($this->ConvertToArray($request), '[logo]'));
            $product->setPrix($this->propertyAccessor->getValue($this->ConvertToArray($request), '[prix]'));
            $product->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
        
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('@'.strtotime('now')));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Modify Product");
            $log->setModule("Product");
            $log->setUrl('/product');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 

            return 'Product '.$product->getNom().' Modifed successfully ';
        }

        return 'Product was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function DeleteProduct(Request $request){

        $productID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $product = $this->entityManager->getRepository(Product::class)->find($productID);
        if($product){
            $this->entityManager->remove($product);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('@'.strtotime('now')));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Delete Product");
            $log->setModule("Product");
            $log->setUrl('/product');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 
            return 'product has been Deleted' ;
        }
            return 'product dosn\'t exist';
    }
    
}