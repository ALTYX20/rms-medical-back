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
    public function findAllProject(): View
    {
        $project = $this->ProjectService->getAllProject();
        return View::create($project, Response::HTTP_OK);

    }

    /**
     * Retrieves an Project resource
     * @Rest\Get("/project/{id}")
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
     * @Rest\Post("/project")
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
     * @Rest\Put("/project")
     * @param Request $request
     * @return View
     */
    public function ModifyProject(Request $request): View
    {
        $project = $this->ProjectService->ModifyProject($request);
        return View::create($project, Response::HTTP_OK);
    }



    /**
     * Delete project byID 
     * @Rest\Delete("/project")
     * @param Request $request
     * @return View
     */
    public function DeleteProject(Request $request): View
    {
        $project = $this->ProjectService->DeleteProject($request);
        return View::create($project, Response::HTTP_OK);
    }

    
}