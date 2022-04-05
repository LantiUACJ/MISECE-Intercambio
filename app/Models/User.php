<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $roles = [
        1=>"Admin",
        2=>"Hospital",
        3=>"Médico",
        4=>"Paramédico",
        5=>"Paciente",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hospital(){
        return $this->hasOne(Hospital::class, "id", "hospital_id");
    }

    public function isAdmin(){
        return $this->rol_id == 1;
    }
    public function isHospital(){
        return $this->rol_id == 3;
    }
    public function isMedico(){
        return $this->rol_id == 3;
    }
    public function isParamedico(){
        return $this->rol_id == 4;
    }
    public function isPaciente(){
        return $this->rol_id == 5;
    }
}
