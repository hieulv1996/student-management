<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getUsers() {
        $users = $this->userRepo->getAll();
        return response()->json([
            'data' => $users,
            'length' => count($users),
        ], Response::HTTP_OK);
    }
}
