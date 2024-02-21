<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserResponseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\User;
use App\Services\User\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index(){
        $users = User::where('status' , true)->orderByDesc('created_at')->get();
        return response(json_encode($users) , 200);
    }

    public function deleteUser($id){
        $user = User::find($id);
        if(!$user || $user->status == 0 ){
            return response(json_encode(['error' => 'user not found']) , 404);
        }
        $user->status = 0;
        $user->save();
        return response(json_encode(['status' => 'success']), 200);
    }


    public function getUserUnique($id){
        $user = User::find($id);
        if(!$user || $user->status == 0 ){
            return response(json_encode(['error' => 'status not found']) , 404);
        }
        $userResponse =   $userResponse = (new UserResponseData)($user);
        return response(json_encode($userResponse) , 200);
    }

}
