<?php


namespace App\Service\interfaces;


use Symfony\Component\HttpFoundation\Request;

interface ProductServiceInterface
{
    function getAllProduct();
    function getProductById(int $id);
    function SetProduct(Request $request);
    function DeleteProduct(int $id);
    function ModifyProduct(int $id,Request $request);
    
}