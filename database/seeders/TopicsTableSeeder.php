<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        Topic::unsetEventDispatcher();
        Topic::factory()->count(100)->create();
    }
}

