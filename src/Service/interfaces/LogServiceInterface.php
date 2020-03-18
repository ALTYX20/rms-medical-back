<?php


namespace App\Service\interfaces;

use App\Entity\Log;
use Symfony\Component\HttpFoundation\Request;

interface LogServiceInterface
{
    function getAllLogs();
    function getUserLog(int $id);
}