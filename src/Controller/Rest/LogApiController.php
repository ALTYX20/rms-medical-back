<?php

namespace App\Controller\Rest;


use App\Service\interfaces\LogServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;


class LogApiController  extends AbstractFOSRestController
{
    private $LogService;

    public function __construct(LogServiceInterface $LogService)
    {
        $this->LogService = $LogService;
    }

    /**
     * Retrieves All Logs.
     *
     * This call post modes data.
     *
     * @Rest\Get("/logs", name="get_all_logs")
     * @return View
     */
    public function findAlllogs(): View
    {
        $log = $this->LogService->getAllLogs();
        return View::create($log, Response::HTTP_OK);

    }

    /**
     * Retrieves an Log resource
     * @Rest\Get("/log/{id}")
     * @param int $id
     * @return View
     */
    public function findUserLog(int $id): View
    {
        $log = $this->LogService->getUserLog($id);
        if ($log) {
            return View::create($log, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }
}