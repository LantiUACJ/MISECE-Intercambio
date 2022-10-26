<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserHospitalController extends Controller{
    public function index(){
        $data = User::orderBy("name", "asc")->where("rol_id", 2);
        return view("userHospital.index",["model"=>$data->paginate(20)]);
    }
    public function create(){
        return view("userHospital.create",["model"=>new User()]);
    }
    public function store(Request $request){
        $data = $request->validate([
            "name"=>"required",
            "password"=>"required",
            "email"=>"required|email|unique:users",
            "hospital_id"=>"required",
        ]);
        $data["rol_id"] = 2;
        $data["password"] = Hash::make($data["password"]);
        $model = User::create($data);
        return redirect()->route("admin.usuario.show",$model->id);
    }
    public function edit(User $user){
        return view("userHospital.update",["model"=>$user]);
    }
    
    public function update(Request $request, User $user){
        $data = $request->validate([
            "name"=>"required",
            "password"=>"nullable",
            "email"=>"required|email|unique:users,email,$user->id",
            "hospital_id"=>"required",
        ]);
        $data["rol_id"] = 2;
        if(isset($data["password"]) && $data["password"]){
            $data["password"] = Hash::make($data["password"]);
        }
        else{
            unset($data["password"]);
        }
        $user->update($data);
        return redirect()->route("admin.usuario.show",$user->id);
    }

    public function show(User $user){
        if($user->rol_id != 2)
            return route("admin.usuario.index");
        return view("userHospital.view",["model"=>$user]);
    }

    public function delete(User $user){
        if($user->canDelete()){
            $user->delete();
        }
        else{
            request()->session()->flash('data_msg', 'Registro en uso, no se puede eliminar');
            request()->session()->flash('data_type', 'danger');
            request()->session()->flash('data_title', 'Error');
        }
        return redirect()->route("admin.usuario.index");
    }
}
