<?php

namespace App\Repositories\CourseRepositories;

use App\Models\Course;
use stdClass;

class LanguageCourseRepository extends CourseRepository {
    public function create(array $attributes){
        $title = $attributes["title"];
        $description = $attributes["description"];
        $type = $attributes["type"];
        $language = new stdClass;
        $language->k = "language";
        $language->v = $attributes["language"];
        $attr = [$language];
        $course = new Course;
        $course->title = $title;
        $course->description = $description;
        $course->type = $type;
        $course->attr = $attr;

        $this->_model->create($course);
    }
}