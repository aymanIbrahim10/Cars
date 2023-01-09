<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contracts(){

        return $this->hasMany(contract::class,'car_id','id');
    }
}
