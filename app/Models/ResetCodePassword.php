<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResetCodePassword extends Model
{
    use HasFactory,SoftDeletes;
    protected $connection = 'pgsql';
    protected $fillable = [
        'email',
        'code',
        'created_at',
    ];

    public $timestamps = false;
    
}
