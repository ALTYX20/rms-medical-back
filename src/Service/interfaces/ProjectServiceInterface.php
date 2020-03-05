<?php


namespace App\Service\interfaces;

use App\Entity\Project;
use Symfony\Component\HttpFoundation\Request;

interface ProjectServiceInterface
{
    function getAllProject();
    function getProjectById(int $id);
    function SetProject(Request $request);
    function DeleteProject(Request $request);
    function ModifyProject(Request $request);
    
}