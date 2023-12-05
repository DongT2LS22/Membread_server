<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class Vocabulary extends Model
{
    use HasFactory,SoftDeletes;
    protected $connection = 'mongodb';
    protected $fillable = [
        'vocabulary',
        'mean',
        'description',
    ];
    protected $table = 'vocabularies';

    public $timestamps = false;
}
