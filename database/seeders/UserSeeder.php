<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成数据集合
        User::factory()->count(10)->create();

        // 单独处理第一个用户的数据
        $dispatcher = User::getEventDispatcher();
        $user_1 = User::find(1);
        $user_1->name = 'wk_nj';
        $user_1->email = 'wk@example.com';
        $user_1->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user_1->save();
        $user_1->assignRole('Founder');
        $user_2 = User::find(2);
        $user_2->assignRole('Maintainer');
        User::setEventDispatcher($dispatcher);
    }
}
