<?php


namespace App\Service\interfaces;

use Symfony\Component\HttpFoundation\Request;

interface CompanyServiceInterface
{
    function getAllCompanys();
    function getcompanyById(int $id);
    function SetCompany(Request $request);
    function DeleteCompany(int $id);
    function ModifyCompany(int $id, Request $request);
    function DisableCompany(Request $request);
    function InviteEmployee(array $employees, int $companyId, string $companyName);
}