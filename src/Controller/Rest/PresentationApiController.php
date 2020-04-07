<?php

namespace App\Controller\Rest;

use App\Entity\Presentation;
use App\Repository\PresentationRepository;
use App\Service\interfaces\PresentationServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Rest\Get("/presentation/{id}", name="Get_Presentation_byId")
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

    /**
     * Creates a presentation resource
     * @Rest\Post("/presentation" , name ="add_Presentation")
     * @param Request $request
     * @return View
     */
    public function AddPresentation(Request $request): View
    {
        if ($request){

            $presentation = $this->PresentationService->SetPresentation($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($presentation, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Modify presentation byID 
     * @Rest\Put("/presentation/{id}",name="Modify_Presentation")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function ModifyPresentation(int $id ,Request $request): View
    {
        $presentation = $this->PresentationService->ModifyPresentation($id ,$request);
        return View::create($presentation, Response::HTTP_OK);
    }


    /**
     * Delete presentation byID
     * @Rest\Delete("/presentation/{id}" ,name="delete_presentatio")
     * @param int $id
     * @return View
     */
    public function DeletePresentationWithId(int $id): View
    {
        $presentation = $this->PresentationService->DeletePresentation($id);
        return View::create($presentation, Response::HTTP_OK);
    }
}