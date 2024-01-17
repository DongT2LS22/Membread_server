<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $fillable = [
        'user_id',
        'course_id',
        'progress'
    ];
    protected $collection = 'participants';
    public $timestamps = false;
}
