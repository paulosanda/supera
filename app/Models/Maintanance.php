<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintanance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_vechicle_id',
        'type_maintanance',
        'next_maintance',
    ];

    public function vechicles()
    {
        return $this->belongsToMany(Vechicle::class, 'user_vechicles', 'vechicle_id');
    }
}
