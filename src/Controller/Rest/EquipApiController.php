<?php

namespace App\Controller\Rest;

use App\Entity\Equip;
use App\Repository\EquipRepository;
use App\Service\interfaces\EquipServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



class EquipApiController  extends AbstractFOSRestController
{
    private $EquipService;

    public function __construct(EquipServiceInterface $EquipService)
    {
        $this->EquipService = $EquipService;
    }

    /**
     * Retrieves All Equips.
     *
     * This call post modes data.
     *
     * @Rest\Get("/equip", name="get_all_equips")
     * @Security("is_granted('ROLE_ADMIN')")
     * @return View
     */
    public function findAllEquips(): View
    {
        $equip = $this->EquipService->getAllEquip();
        return View::create($equip, Response::HTTP_OK);

    }

    /**
     * Retrieves an equip resource
     * @Rest\Get("/equip/{id}" , name = "get_equip_byId")
     * @Security("is_granted('ROLE_MANAGER')")
     * @param int $id
     * @return View
     */
    public function findEquipById(int $id): View
    {
        $equip = $this->EquipService->getEquipById($id);
        if ($equip) {
            return View::create($equip, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Add Equip.
     *
     * This call post modes data.
     *
     * @Rest\Post("/equip", name="add_equip")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @return View
     */
    public function AddEquip(Request $request): View
    {
        $equip = $this->EquipService->setEquip($request);
        return View::create($equip, Response::HTTP_OK);

    }

    /**
     * Delete equip 
     * @Rest\Delete("/equip/{id}" ,name="Delete_equip")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param int $id
     * @return View
     */
    public function DeleteEquip(int $id): View
    {
        $equip = $this->EquipService->DeleteEquip($id);
        return View::create($equip, Response::HTTP_OK);
    }

    /**
     * Retrieves an equip resource
     * @Rest\Get("/equip/{id}/members" , name ="get_equip_members")
     * @Security("is_granted('ROLE_MANAGER')")
     * @return View
     */
    public function showMembers(int $id): View
    {
        $members = $this->EquipService->ShowMembers($id);
        return View::create($members, Response::HTTP_OK);
    }

    /**
     * Retrieves an equip resource
     * @Rest\Post("/equip/{id}/addMembers" , name ="add_member_to_equip")
     * @Security("is_granted('ROLE_MANAGER')")
     * @return View
     */
    public function addMembers(Request $request, int $id): View
    {
        $members = $this->EquipService->AddMembers($request , $id);
        return View::create($members, Response::HTTP_OK);
    }

    /**
     * Retrieves an equip resource
     * @Rest\Post("/equip/{id}/removeMembers" , name ="remove_member_from_equip")
     * @Security("is_granted('ROLE_MANAGER')")
     * @return View
     */
    public function removeMembers(Request $request, int $id): View
    {
        $members = $this->EquipService->RemoveMembers($request , $id);
        return View::create($members, Response::HTTP_OK);
    }


}