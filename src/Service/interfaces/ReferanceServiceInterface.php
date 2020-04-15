<?php


namespace App\Service\interfaces;


use Symfony\Component\HttpFoundation\Request;

interface ReferanceServiceInterface
{
    function getAllReferance();
    function getReferanceById(int $id);
    function Setreferance(Request $request);
    function Deletereferance(int $id);
    function ModifyReferance(int $id, Request $request);
    
}