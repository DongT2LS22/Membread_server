<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'title' => 'test course',
            'description' => 'mo ta course',
            'isPublic' => 'true',
            'owner_id' => User::first()->_id,
            'create_at' => Carbon::now()->toString(),
            'lessons' => [
                [
                    'id' => DB::collection('lessons')->first()['_id'],
                    'lesson' => DB::collection('lessons')->first()['title'],
                    'order' => DB::collection('lessons')->first()['order'],
                ]
            ]
        ]);
    }
}
