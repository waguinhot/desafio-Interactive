<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserResponseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Services\User\LoginService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $login = new LoginService();
        $user = $login->handle($request);
        if (!$user) {

            return response(json_encode(['error' => 'login incorrect']), 402);
        }
        $userResponse = (new UserResponseData)($user);

         $token = $user->createToken('token_application')->plainTextToken;

         return ['user' => $userResponse , 'token' => $token];

    }
 public function getUser(Request $request){
        /** @var User $user */
        $user = $request->user();

        $userResponse = (new UserResponseData)($user);

        $data = ['user' => $userResponse];

        return response(json_encode($data), 200);
    }
}
