<?php


namespace App\Service\interfaces;


use Symfony\Component\HttpFoundation\Request;

interface ProjectServiceInterface
{
    function getAllProject();
    function getProjectById(int $id);
    function SetProject(Request $request);
    function DeleteProject(int $id);
    function ModifyProject(int $id, Request $request);
    
}