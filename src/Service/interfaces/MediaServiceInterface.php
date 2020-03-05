<?php


namespace App\Service\interfaces;

use App\Entity\Media;
use Symfony\Component\HttpFoundation\Request;

interface MediaServiceInterface
{
    function getAllMedia();
    function getMediaById(int $id);
    function SetMedia(Request $request);
    function DeleteMedia(Request $request);
    function ModifyMedia(Request $request);
    
}