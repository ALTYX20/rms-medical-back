<?php

namespace App\Controller\Rest;


use App\Service\interfaces\ProjectServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;



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
     * @Security("is_granted('ROLE_VIEWER')")
     * @return View
     */
    public function findAllProject(): View
    {
        $project = $this->ProjectService->getAllProject();
        return View::create($project, Response::HTTP_OK);

    }

    /**
     * Retrieves an Project resource
     * @Rest\Get("/project/{id}")
     * @Security("is_granted('ROLE_VIEWER')")
     * @param int $id
     * @return View
     */
    public function findProjectById(int $id): View
    {
        $project = $this->ProjectService->getProjectById($id);
        if ($project) {
            return View::create($project, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Creates a Project resource
     * @Rest\Post("/project", name="add_project")
     * @Security("is_granted('ROLE_MANAGER')")
     * @param Request $request
     * @return View
     */
    public function AddProject(Request $request): View
    {
        if ($request){

            $project = $this->ProjectService->SetProject($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($project, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Modify Project byID 
     * @Rest\Put("/project/{id}", name="modify_project")
     * @Security("is_granted('ROLE_EDITOR')")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function ModifyProject(int $id, Request $request): View
    {
        $project = $this->ProjectService->ModifyProject($id,$request);
        return View::create($project, Response::HTTP_OK);
    }



    /**
     * Delete project byID 
     * @Rest\Delete("/project/{id}", name="Delete_project")
     * @Security("is_granted('ROLE_MANAGER')")
     * @return View
     */
    public function DeleteProject(int $id): View
    {
        $project = $this->ProjectService->DeleteProject($id);
        return View::create($project, Response::HTTP_OK);
    }

    
}