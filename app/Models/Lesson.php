<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];
    public $timestamps = false;

    protected $connection = 'pgsql';
    public function vocabularies(): HasMany
    {
        return $this->hasMany(Vocabulary::class);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
