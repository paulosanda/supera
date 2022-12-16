<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'version',
    ];
}
