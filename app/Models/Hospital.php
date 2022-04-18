<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Hospital extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        "url",
        "user",
        "password",
        "nombre",
        "telefono",
        "email",
        "calle",
        "numero",
        "colonia",
        "codigo_postal",
        "ciudad",
        "estado",
    ];

    public function lastIndice(){
        return $this->hasOne(HospitalIndice::class, "hospital_id", "id")->orderBy("created_at", "desc");
    }
}
