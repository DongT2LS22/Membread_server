<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class Course extends Model
{
    use HasFactory,HybridRelations,SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'courses';
    protected $fillable = [
        'title',
        'description',
    ];

    public $timestamps = true;
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
