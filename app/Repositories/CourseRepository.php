<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends EloquentRepository {
    public function setModel(){
        $this->_model = Course::class;
    }
}