<?php

namespace App\Controller\Rest;

use App\Entity\Users;
use App\Repository\UsersRepository;
use App\Service\interfaces\UsersServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;



class UserApiController  extends AbstractFOSRestController
{
    private $UsersService;

    public function __construct(UsersServiceInterface $UsersService)
    {
        $this->UsersService = $UsersService;

      /* $em = $this->getDoctrine()->getManager();
        $em->getConnection()->connect();
        $connected = $em->getConnection()->isConnected(); */
    }


    /**
     * Retrieves All Users resource.
     *
     * This call post modes data.
     *
     * @Rest\Get("/users", name="get_all_users")
     * @return View
     */
    public function findAllUsers(): View
    {
        $user = $this->UsersService->getAllUsers();
        return View::create($user, Response::HTTP_OK);

    }

    /**
     * Retrieves an user resource
     * @Rest\Get("/user/{id}")
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
     * @Rest\Post("/signup")
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
     * Check if User Exist 
     * @Rest\Post("/login")
     * @param Request $request
     * @return View
     */
    public function Login(Request $request): View
    {
        if ($request){

            $user = $this->UsersService->UserExist($request);
            // In case our POST was a success we need to return a 201 HTTP CREATED response
            if ($user){
                return View::create($user, Response::HTTP_OK);
            }
        }
        return View::create('Not Found', Response::HTTP_NOT_FOUND);
    }


    /**
     * Delete user byID 
     * @Rest\Delete("/delete")
     * @param Request $request
     * @return View
     */
    public function DeleteUser(Request $request): View
    {
        $user = $this->UsersService->DeleteUser($request);
        return View::create($user, Response::HTTP_OK);
    }

    /**
     * Delete user byID
     * @Rest\Delete("/delete/{id}")
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function DeleteUserwithId(Request $request , int $id): View
    {
        $user = $this->UsersService->DeleteUser($request ,$id);
        return View::create($user, Response::HTTP_OK);
    }

    /**
     * Modify user byID 
     * @Rest\Put("/modify")
     * @param Request $request
     * @return View
     */
    public function ModifyUser(Request $request): View
    {
        $user = $this->UsersService->ModifyUser($request);
        return View::create($user, Response::HTTP_OK);
    }

}
