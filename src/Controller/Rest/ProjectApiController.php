<?php

namespace App\Controller\Rest;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Service\interfaces\ProjectServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;



class ProjectApiController  extends AbstractFOSRestController
{
    private $ProjectService;

    public function __construct(ProjectServiceInterface $ProjectService)
    {
        $this->ProjectService = $ProjectService;
    }

    /**
     * Retrieves All Projects resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/project", name="get_all_projects")
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

    
}