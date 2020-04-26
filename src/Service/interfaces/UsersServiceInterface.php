<?php


namespace App\Service\interfaces;


use Symfony\Component\HttpFoundation\Request;

interface UsersServiceInterface
{
    function getAllUsers();
    function getUsersById(int $id);
    function SetUser(Request $request);
    function DeleteUser(int $id);
    function ModifyUser(int $id,Request $request);
    function ChangeRole(int $id , String $role);
    function getUser();
}