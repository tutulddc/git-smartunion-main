<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded=['id'];

    // function rel_to_division(){
    //     return $this->hasMany(District::class,'division_id');
    // }
    function rel_to_div(){
        return $this->belongsTo(Division::class,'division_id');
    }
    function rel_to_dist(){
        return $this->belongsTo(District::class,'district_id');
    }
    function rel_to_upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id');
    }
    function rel_to_union(){
        return $this->belongsTo(Union::class,'union_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
