<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('lessons')->insert([
            'title' => 'lesson 1',
            'type' => 'language',
            'language' => 'English',
            'description' => 'Mo ta lesson 1',
            'order' => 1,
            'vocabularies' => [
                ['vocabulary' => 'hello' , 'mean' => 'xin chao'],
                ['vocabulary' => 'goodbye' , 'mean' => 'tam biet']
            ]
        ]);
    }
}
