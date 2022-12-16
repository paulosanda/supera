<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVechicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vechicle_id',
    ];

    public function maintanance()
    {
        return $this->hasMany('Maintanance');
    }

    public function vechicle()
    {
        return $this->belongsTo(Vechicle::class);
    }
}
