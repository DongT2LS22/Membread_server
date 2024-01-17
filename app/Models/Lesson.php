<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class Lesson extends Model
{
    use HasFactory,HybridRelations,SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'attr'
    ];
    public $timestamps = false;
    protected $collection = 'lessons';
    protected $connection = 'mongodb';
    public function vocabularies()
    {
        return $this->hasMany(Vocabulary::class);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
