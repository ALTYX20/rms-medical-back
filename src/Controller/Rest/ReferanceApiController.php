<?php

namespace App\Controller\Rest;


use App\Service\interfaces\ReferanceServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;



class ReferanceApiController  extends AbstractFOSRestController
{
    private $ReferanceService;

    public function __construct(referanceServiceInterface $ReferanceService)
    {
        $this->ReferanceService = $ReferanceService;
    }


    /**
     * Retrieves All referances resource.
     *
     * This call post modes data.
     * 
     * @Rest\Get("/referance", name="get_all_referances")
     * @Security("is_granted('ROLE_VIEWER')")
     * @return View
     */
    public function findAllReferance(): View
    {

        $referance = $this->ReferanceService->getAllReferance();
        return View::create($referance, Response::HTTP_OK);

    }

    /**
     * Retrieves an referance resource
     * @Rest\Get("/referance/{id}" ,name ="get_reference_byId")
     * @Security("is_granted('ROLE_VIEWER')")
     * @param int $id
     * @return View
     */
    public function findReferanceById(int $id): View
    {
        $referance = $this->ReferanceService->getReferanceById($id);
        if ($referance) {
            return View::create($referance, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Creates a referance resource
     * @Rest\Post("/referance", name="add_reference")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param Request $request
     * @return View
     */
    public function AddReferance(Request $request): View
    {
        if ($request){

            $referance = $this->ReferanceService->SetReferance($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($referance, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Modify referance byID 
     * @Rest\Put("/referance/{id}", name="Modify_reference")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function ModifyReferance(int $id ,Request $request): View
    {
        $referance = $this->ReferanceService->ModifyReferance($id,$request);
        return View::create($referance, Response::HTTP_OK);
    }



    /**
     * Delete referance byID 
     * @Rest\Delete("/referance/{id}" , name="Delete_Reference")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param int $id
     * @return View
     */
    public function DeleteReferance(int $id): View
    {
        $referance = $this->ReferanceService->DeleteReferance($id);
        return View::create($referance, Response::HTTP_OK);
    }

    
}