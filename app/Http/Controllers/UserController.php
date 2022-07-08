<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller{

    public function index(){
        $data = User::orderBy("name", "asc");
        if(auth()->user()->rol_id != 1)
            $data->where("hospital_id", auth()->user()->hospital_id)->where("rol_id", ">", 1);
        return view("user.index",["model"=>$data->paginate(20)]);
    }

    public function create(){
        return view("user.create",["model"=>new User()]);
    }

    public function store(Request $request){
        $data = $request->validate(User::validateArray());
        $data["password"] = Hash::make($data["password"]);
        $data["hospital_id"] = auth()->user()->hospital_id;
        $model = User::create($data);
        if($model){
            return redirect("users/view/".$model->id);
        }
        return redirect("error");
    }

    public function edit(User $user){
        return view("user.update",["model"=>$user]);
    }
    
    public function update(Request $request, User $user){
        $data = $request->validate(User::updateValidateArray($user->id));
        if(isset($data["password"]) && $data["password"]){
            $data["password"] = Hash::make($data["password"]);
        }
        else{
            unset($data["password"]);
        }
        if($user->update($data)){
            return redirect("users/view/".$user->id);
        }
        return redirect("error");
    }

    public function show(User $user){
        return view("user.view",["model"=>$user]);
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
        return redirect("users");
    }
}
