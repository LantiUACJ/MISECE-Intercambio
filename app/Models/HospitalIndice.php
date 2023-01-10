<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalIndice extends Model
{
    use HasFactory;

    protected $fillable = [
        "hospital_id",
        "indice_id",
        "created_at",
        "updated_at"
    ];

    public function hospital(){
        return $this->hasOne(Hospital::class,"id","hospital_id");
    }
    public function indice(){
        return $this->hasOne(Indice::class,"id","indice_id");
    }
}
