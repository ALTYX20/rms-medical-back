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
        $media = $this->UsersService->getAllMedia();
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

}