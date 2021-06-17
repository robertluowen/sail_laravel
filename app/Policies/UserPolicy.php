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


    /**
     * 只有管理员才可以执行删除操作
     */
    public function destroy(User $currentUser,User $user){
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
