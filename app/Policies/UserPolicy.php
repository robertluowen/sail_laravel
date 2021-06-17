<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
//授权策略
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*
     * $currentUser 当前登录用户实例
     * $user 进行授权的用户实例
     */
    public function update(User $currentUser,User $user){
        return $currentUser->id === $user->id;
    }
}
