<?php


namespace App\Service\interfaces;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

interface ProductServiceInterface
{
    function getAllProduct();
    function getProductById(int $id);
    
}