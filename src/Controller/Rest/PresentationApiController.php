<?php

namespace App\Controller\Rest;

use App\Entity\Presentation;
use App\Repository\PresentationRepository;
use App\Service\interfaces\PresentationServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;



class PresentationApiController  extends AbstractFOSRestController
{
    private $PresentationService;

    public function __construct(PresentationServiceInterface $PresentationService)
    {
        $this->PresentationService = $PresentationService;
    }


    /**
     * Retrieves All Presentation resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/presentation", name="get_all_presentation")
     * @return View
     */
    public function findAllPresentation(): View
    {
        $presentation = $this->PresentationService->getAllPresentation();
        return View::create($presentation, Response::HTTP_OK);

    }

    /**
     * Retrieves an presentation resource
     * @Rest\Get("/presentation/{id}")
     * @param int $id
     * @return View
     */
    public function findPresentationById(int $id): View
    {
        $presentation = $this->PresentationService->getPresentationById($id);
        if ($presentation) {
            return View::create($presentation, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }
    
}