<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indice extends Model
{
    use HasFactory;

    public function hospitales(){
        return $this->hasMany(HospitalIndice::class,"indice_id","id");
    }
}
