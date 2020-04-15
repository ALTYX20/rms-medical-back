<?php


namespace App\Service\interfaces;

use Symfony\Component\HttpFoundation\Request;

interface EquipServiceInterface
{
    function getAllEquip();
    function getEquipById(int $id);
    function SetEquip(Request $request);
    function ShowMembers(int $id);
    function DeleteEquip(int $id);
    function AddMembers(Request $request, int $id);
    function RemoveMembers(Request $request, int $id);

}