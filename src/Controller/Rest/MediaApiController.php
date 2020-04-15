<?php

namespace App\Controller\Rest;


use App\Service\interfaces\MediaServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Rest\Get("/media/{id}" , name="Get_Media_byId")
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
     * @Rest\Post("/media" , name="add_Media")
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
     * Upload File to the created Media
     * @Rest\Post("/media/{id}/upload" , name ="Upload_Media")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function UploadMedia(Request $request,int $id) : view
    {
        if ($request){
            $uploadDir = $this->getParameter('uploads_dir');
            $media = $this->MediaService->UploadFile($request , $id  , $uploadDir);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($media, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Modify Media byID 
     * @Rest\Put("/media/{id}" , name ="Modify_media")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function ModifyMedia(int $id ,Request $request): View
    {
        $media = $this->MediaService->ModifyMedia($id ,$request);
        return View::create($media, Response::HTTP_OK);
    }


    /**
     * Delete media byID 
     * @Rest\Delete("/media/{id}" ,name="Delete_media")
     * @param int $id
     * @return View
     */
    public function DeleteMedia(int $id): View
    {
        $media = $this->MediaService->DeleteMedia($id);
        return View::create($media, Response::HTTP_OK);
    }

}