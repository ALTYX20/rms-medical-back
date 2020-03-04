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
    
}