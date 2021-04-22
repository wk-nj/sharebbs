<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            [
                'name'        => '分享',
                'description' => "分享创造，分享发现",
                'user_id'     => 1
            ],
            [
                'name'        => '教程',
                'description' => "开发技巧、推荐扩展包等",
                'user_id'     => 1
            ],
            [
                'name'        => '问答',
                'description' => "请保持友善，互帮互助",
                'user_id'     => 1
            ],
            [
                'name'        => '公告',
                'description' => "站点公告",
                'user_id'     => 1
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
