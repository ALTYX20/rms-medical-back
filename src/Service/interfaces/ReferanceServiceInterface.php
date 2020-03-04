<?php


namespace App\Service\interfaces;

use App\Entity\Referance;
use Symfony\Component\HttpFoundation\Request;

interface ReferanceServiceInterface
{
    function getAllReferance();
    function getReferanceById(int $id);
    
}