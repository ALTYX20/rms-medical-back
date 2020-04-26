<?php

namespace App\Controller\Rest;


use App\Service\interfaces\ProductServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;



class ProductApiController  extends AbstractFOSRestController
{
    private $ProductService;

    public function __construct(ProductServiceInterface $ProductService)
    {
        $this->ProductService = $ProductService;
    }
    
    /**
     * Retrieves All Products resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/product", name="get_all_products")
     * @Security("is_granted('ROLE_VIEWER')")
     * @return View
     */
    public function findAllProduct(): View
    {
        $product = $this->ProductService->getAllProduct();
        return View::create($product, Response::HTTP_OK);

    }

    /**
     * Retrieves an product resource
     * @Rest\Get("/product/{id}")
     * @Security("is_granted('ROLE_VIEWER')")
     * @param int $id
     * @return View
     */
    public function findProductById(int $id): View
    {
        $product = $this->ProductService->getProductById($id);
        if ($product) {
            return View::create($product, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Creates a User resource
     * @Rest\Post("/product" ,name = "add_product")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param Request $request
     * @return View
     */
    public function AddProduct(Request $request): View
    {
        if ($request){

            $product = $this->ProductService->SetProduct($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($product, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }


    /**
     * Modify product byID 
     * @Rest\Put("/product/{id}" , name="Modify_product")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function ModifyUser(int $id,Request $request): View
    {
        $product = $this->ProductService->ModifyProduct($id,$request);
        return View::create($product, Response::HTTP_OK);
    }


    /**
     * Delete product byID 
     * @Rest\Delete("/product/{id}", name="Delete_product")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param int $id
     * @return View
     */
    public function DeleteProduct(int $id): View
    {
        $product = $this->ProductService->DeleteProduct($id);
        return View::create($product, Response::HTTP_OK);
    }

    
}