<?php


namespace App\Service\interfaces;

use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

interface UsersServiceInterface
{
    function getAllUsers();
    function getUsersById(int $id);
    function SetUser(Request $request);
    function UserExist(Request $request);
    function DeleteUser(int $id);
    function ModifyUser(int $id,Request $request);
    function ChangeRole(int $id , String $role);
}