<?php

namespace App\Controller\Rest;

use App\Entity\Media;
use App\Repository\MediaRepository;
use App\Service\interfaces\MediaServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;


class MediaApiController  extends AbstractFOSRestController
{
    private $MediaService;

    public function __construct(MediaServiceInterface $MediaService)
    {
        $this->MediaService = $MediaService;
    }


    /**
     * Retrieves All Media resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/media", name="get_all_medias")
     * @return View
     */
    public function findAllMedia(): View
    {
        $media = $this->MediaService->getAllMedia();
        return View::create($media, Response::HTTP_OK);

    }

    /**
     * Retrieves an media resource
     * @Rest\Get("/media/{id}")
     * @param int $id
     * @return View
     */
    public function findMediaById(int $id): View
    {
        $media = $this->MediaService->getMediaById($id);
        if ($media) {
            return View::create($media, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }


    /**
     * Creates a Media resource
     * @Rest\Post("/media")
     * @param Request $request
     * @return View
     */
    public function AddMedia(Request $request): View
    {
        if ($request){

            $media = $this->MediaService->SetMedia($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($media, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Modify Media byID 
     * @Rest\Put("/media")
     * @param Request $request
     * @return View
     */
    public function ModifyMedia(Request $request): View
    {
        $media = $this->MediaService->ModifyMedia($request);
        return View::create($media, Response::HTTP_OK);
    }


    /**
     * Delete media byID 
     * @Rest\Delete("/media")
     * @param Request $request
     * @return View
     */
    public function DeleteMedia(Request $request): View
    {
        $media = $this->MediaService->DeleteMedia($request);
        return View::create($media, Response::HTTP_OK);
    }

}