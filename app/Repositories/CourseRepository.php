<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends EloquentRepository {
    public function getModel(){
        return Course::class;
    }
}