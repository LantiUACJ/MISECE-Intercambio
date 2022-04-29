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

    protected static $rolesArray = [
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
        'rol_id',
        'password',
        'hospital_id',
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

    public static function formColumns(){
        return [
            [
                "field"=>"name",
                "required"=>true,
                "type"=>"text",
                "label"=>"Nombre completo",
            ],
            [
                "field"=>"email",
                "required"=>true,
                "type"=>"email",
                "label"=>"Correo electrónico",
            ],
            [
                "field"=>"password",
                "required"=>true,
                "type"=>"password",
                "label"=>"Contraseña",
            ],
            [
                "field"=>"rol_id",
                "required"=>true,
                "type"=>"select",
                "label"=>"Nivel de acceso",
                "options"=>static::roles(),
                "select_value"=>"id",
                "select_name"=>"nombre",
            ],
        ];
    }

    public function updateFormColumns(){
        $form = static::formColumns();
        foreach($form as $key => $input){
            $field = $input["field"];
            if($field != "password")
                $form[$key]["value"] = $this->$field;
        }
        return $form;
    }

    public static function validateArray(){
        return [
            "name"=>"required",
            "password"=>"required",
            "email"=>"required|email|unique:users",
            "rol_id"=>"required"
        ];
    }

    public static function updateValidateArray($id){
        return [
            "name"=>"required",
            "password"=>"nullable",
            "email"=>"required|email|unique:users,email,".$id,
            "rol_id"=>"required"
        ];
    }

    private static function roles(){
        $roles = [];
        foreach(static::$rolesArray as $id => $name){
            $obj = new class($name, $id) {
                public function __construct($name, $id)
                {
                    $this->nombre = $name;
                    $this->id = $id;
                }
            };
            $roles[] = $obj;
        }
        
        return $roles;
    }

    public function nombreRol(){
        return static::$rolesArray[$this->rol_id];
    }

    public function hospital(){
        return $this->hasOne(Hospital::class, "id", "hospital_id");
    }

    public function isAdmin(){
        return $this->rol_id == 1;
    }
    public function isHospital(){
        return $this->rol_id == 2;
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