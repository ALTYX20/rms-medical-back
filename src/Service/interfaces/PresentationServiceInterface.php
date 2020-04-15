<?php


namespace App\Service\interfaces;


use Symfony\Component\HttpFoundation\Request;

interface PresentationServiceInterface
{
    function getAllPresentation();
    function getPresentationById(int $id);
    function SetPresentation(Request $request);
    function DeletePresentation(int $id);
    function ModifyPresentation(int $id,Request $request);
    
}