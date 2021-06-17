<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();
        //更新第一个用户，用于登录
        $user = User::find(1);
        $user->name = 'luowen';
        $user->email = '757120778@qq.com';
        $user->save();
    }
}
