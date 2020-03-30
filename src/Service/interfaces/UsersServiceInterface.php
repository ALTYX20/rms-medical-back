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
    function DeleteUser(Request $request, int $id);
    function ModifyUser(Request $request);
    function ChangeRole(int $id , String $role);
}