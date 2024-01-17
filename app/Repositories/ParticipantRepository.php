<?php

namespace App\Repositories;

use App\Models\Participant;
use App\Repositories\EloquentRepository;

class ParticipantRepository extends EloquentRepository{
    public function getModel(){
        return Participant::class;
    }

    public function updateProgressCourse($id,array $attributes){
        $participant =  $this->_model->find($id);
        $progress = $attributes['progress'];
        $participant->progress+=$progress;
        return $participant->save();
    }

    public function create(array $attributes){
        $user_id = $attributes['user_id'];
        $course_id = $attributes['course_id'];
        return $this->_model->create(['user_id' =>$user_id,'course_id'=>$course_id,'progress' => []]);
    }
}