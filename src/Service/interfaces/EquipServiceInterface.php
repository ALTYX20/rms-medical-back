<?php


namespace App\Service\interfaces;

use App\Entity\Equip;
use Symfony\Component\HttpFoundation\Request;

interface EquipServiceInterface
{
    function getAllEquip();
    function getEquipById(int $id);

}