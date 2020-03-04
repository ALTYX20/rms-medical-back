<?php


namespace App\Service;

use App\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\MediaServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

class MediaService implements MediaServiceInterface
{
    private $entityManager;
    private $propertyAccessor;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    
    /**
     * @param Request $request
     * @return object[]
     */
    public function ConvertToArray(Request $request){

        // Getting Parameters from Json Request
        $parameters = [];
        if ($content = $request->getContent()) {
            $parameters = json_decode($content, true);
        }
        return $parameters;

    }

    /**
     * @return object[]
     */
    function getAllMedia() {
        $media = $this->entityManager->getRepository(Media::class)->findAll();
        return $media;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getMediaById(int $id)
    {
        return $this->entityManager->getRepository(Media::class)->find($id);
    }
    
}