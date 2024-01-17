<?php

namespace App\Repositories\CourseRepositories;

use App\Models\Course;
use App\Repositories\EloquentRepository;
class CourseRepository extends EloquentRepository {
    public function getModel(){
        return Course::class;
    }
}