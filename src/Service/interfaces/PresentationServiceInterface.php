<?php


namespace App\Service\interfaces;

use App\Entity\Presentation;
use Symfony\Component\HttpFoundation\Request;

interface PresentationServiceInterface
{
    function getAllPresentation();
    function getPresentationById(int $id);
    
}