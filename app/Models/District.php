<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    // function rel_to_division(){
    //     return $this->hasMany(District::class,'division_id');
    // }
    function rel_to_division(){
        return $this->belongsTo(District::class,'division_id');
    }
}
