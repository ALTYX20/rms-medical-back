<?php


namespace App\Service\interfaces;


interface LogServiceInterface
{
    function getAllLogs();
    function getUserLog(int $id);
}