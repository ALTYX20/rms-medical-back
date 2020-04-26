<?php

namespace App\Controller\Rest;


use App\Service\interfaces\UsersServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;



class UserApiController  extends AbstractFOSRestController
{
    private $UsersService;

    public function __construct(UsersServiceInterface $UsersService )
    {
        $this->UsersService = $UsersService;
    }


    /**
     * Retrieves All Users resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/users", name="get_all_users")
     * @Security("is_granted('ROLE_ADMIN')")
     * @return View
     */
    public function findAllUsers(): View
    {
        $user = $this->UsersService->getAllUsers();
        return View::create($user, Response::HTTP_OK);

    }

    /**
     * Retrieves an user resource
     * @Rest\Get("/user/{id}" , name ="get_uer_byId")
     * @Security("is_granted('ROLE_VIEWER')")
     * @param int $id
     * @return View
     */
    public function findUsersById(int $id): View
    {
        $user = $this->UsersService->getUsersById($id);
        if ($user) {
            return View::create($user, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Creates a User resource
     * @Rest\Post("/signup", name="add_user")
     * @param Request $request
     * @return View
     */
    public function AddUser(Request $request): View
    {
        if ($request){

            $user = $this->UsersService->SetUser($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            return View::create($user, Response::HTTP_CREATED);

        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Delete user byID
     * @Rest\Delete("/delete/{id}", name="Delete_user")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param int $id
     * @return View
     */
    public function DeleteUserWithId(int $id): View
    {
        $user = $this->UsersService->DeleteUser($id);
        return View::create($user, Response::HTTP_OK);
    }

    /**
     * Modify user byID 
     * @Rest\Put("/user/{id}", name="Modify_user")
     * @Security("is_granted('ROLE_VIEWER')")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function ModifyUser(int $id ,Request $request): View
    {
        $user = $this->UsersService->ModifyUser($id,$request);
        return View::create($user, Response::HTTP_OK);
    }

}
