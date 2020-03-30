<?php


namespace App\Service\interfaces;

use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;

interface CompanyServiceInterface
{
    function getAllCompanys();
    function getcompanyById(int $id);
    function SetCompany(Request $request);
    function DeleteCompany(Request $request);
    function ModifyCompany(Request $request);
    function DisableCompany(Request $request);
    function InviteEmployee(array $employees);
}