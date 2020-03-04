<?php


namespace App\Service\interfaces;

use App\Entity\Media;
use Symfony\Component\HttpFoundation\Request;

interface MediaServiceInterface
{
    function getAllMedia();
    function getMediaById(int $id);
    
}