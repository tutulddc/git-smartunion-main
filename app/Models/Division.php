<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    // function rel_to_district(){
    //     return $this->hasMany(District::class,'division_id');
    // }
}
