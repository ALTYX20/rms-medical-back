<?php


namespace App\Service;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\ProductServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

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
        $product = $this->entityManager->getRepository(Product::class)->findAll();
        return $product;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getProductById(int $id)
    {
        return $this->entityManager->getRepository(Product::class)->find($id);
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
        $product->setNom($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]')));
        $product->setLogo($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[logo]')));
        $product->setPrix($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[prix]')));
        $product->setType($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[type]')));
        $product->setDescription($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]')));
        
        //Prepar and inject product into database
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        return 'Product added successfully ';
    }



    /**
     * @param Request $request
     */
    public function ModifyProduct(Request $request){

        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['nom' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]')]);
        if($product){

            $product->setNom($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]')));
            $product->setType($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[type]')));
            $product->setLogo($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[logo]')));
            $product->setPrix($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[prix]')));
            $product->setDescription($this->entityManager->getRepository(Product::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]')));
        
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
            return 'product has been Deleted' ;
        }
            return 'product dosn\'t exist';
    }
    
}