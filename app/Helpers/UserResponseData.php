<?php

namespace App\Helpers;

use App\Models\User;

class UserResponseData {
    public function __invoke(User $user){
        return ['name' => $user->name , 'email' => $user->email , 'birthdate' => $user->birthdate , 'balance' => $user->balance];
    }
}
