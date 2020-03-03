<?php

namespace App\Controller\Rest;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use App\Service\interfaces\CompanyServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;


class CompanyApiController  extends AbstractFOSRestController
{

    private $CompanyService;

    public function __construct(CompanyServiceInterface $CompanyService)
    {
        $this->CompanyService = $CompanyService;

      /* $em = $this->getDoctrine()->getManager();
        $em->getConnection()->connect();
        $connected = $em->getConnection()->isConnected(); */
    }

    /**
     * Retrieves All Companys resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/companys", name="get_all_companys")
     * @return View
     */
    public function findAllCompanys(): View
    {
        $company = $this->CompanyService->getAllCompanys();
        return View::create($company, Response::HTTP_OK);

    }

    /**
     * Retrieves an user resource
     * @Rest\Get("/company/{id}")
     * @param int $id
     * @return View
     */
    public function findCompanyById(int $id): View
    {
        $company = $this->CompanyService->getCompanyById($id);
        if ($company) {
            return View::create($company, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Creates a Company resource
     * @Rest\Post("/company")
     * @param Request $request
     * @return View
     */
    public function AddCompany(Request $request): View
    {
        if ($request){

            $company = $this->CompanyService->SetCompany($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($company, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Creates a Company resource
     * @Rest\Delete("/company")
     * @param Request $request
     * @return View
     */
    public function DeleteCompany(Request $request): View
    {
        if($request){

            $company = $this->CompanyService->DeleteCompany($request);
            return View::create($company, Response::HTTP_OK);

        }
    }

    /**
     * Modify company byID 
     * @Rest\Put("/company")
     * @param Request $request
     * @return View
     */
    public function ModifyCompany(Request $request): View
    {
        $user = $this->CompanyService->ModifyCompany($request);
        return View::create($user, Response::HTTP_OK);
    }
}                                                                                            
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
 