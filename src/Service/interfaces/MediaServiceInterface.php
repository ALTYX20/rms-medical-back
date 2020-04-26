<?php


namespace App\Service\interfaces;


use Symfony\Component\HttpFoundation\Request;

interface MediaServiceInterface
{
    function getAllMedia();
    function getMediaById(int $id);
    function SetMedia(Request $request);
    function DeleteMedia(int $id);
    function ModifyMedia(int $id ,Request $request);
    function UploadFile(Request $request,int $id , string $uploadDir);
    function getUser();
    
}