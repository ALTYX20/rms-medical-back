<?php

namespace App\Controller\Rest;


use App\Service\interfaces\CompanyServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;

class CompanyApiController  extends AbstractFOSRestController
{

    private $CompanyService;

    public function __construct(CompanyServiceInterface $CompanyService)
    {
        $this->CompanyService = $CompanyService;

    }

    /**
     * Retrieves All Companys resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/company", name="get_all_companys")
     * @Security("is_granted('ROLE_SUPER_ADMIN')")
     * @return View
     */
    public function findAllCompanys(): View
    {
        $company = $this->CompanyService->getAllCompanys();
        return View::create($company, Response::HTTP_OK);

    }

    /**
     * Retrieves an user resource
     * @Rest\Get("/company/{id}" , name ="Get_company_byId")
     * @Security("is_granted('ROLE_ADMIN')")
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
     * @Rest\Post("/company" , name ="Add_company")
     * 
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
     * Delete a Company resource
     * @Rest\Delete("/company/{id}" , name ="Delete_Company")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param int $id
     * @return View
     */
    public function DeleteCompany(int $id): View
    {
        $company = $this->CompanyService->DeleteCompany($id);
        return View::create($company, Response::HTTP_OK);
    }

    /**
     * Modify company byID 
     * @Rest\Put("/company/{id}" , name = "Modify_Company")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param int $id
     * @param Request $request
     * @return View
     */
    public function ModifyCompany(int $id , Request $request): View
    {
        $user = $this->CompanyService->ModifyCompany($id , $request);
        return View::create($user, Response::HTTP_OK);
    }
}                                                                                            
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
 