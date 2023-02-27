<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;


class UserController extends Controller
{
    public function getClientes()
    {
        return User::all();
    }

    public function create(Request $request)
    {

        $first_name   =   $request->input('first_name');
        $last_name    =   $request->input('last_name');
        $type         =   $request->input('type');
        $email        =   $request->input('email');
        $password     =   $request->input('password');
        $password = Hash::make($password);

        $user = User::create([
            'first_name'    =>  $first_name,
            'last_name'     =>  $last_name,
            'type'          =>  $type,
            'email'         =>  $email,
            'password'      =>  $password,
            'status'        =>  1,
        ]);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
    public function update(Request $request,$id)
    {
        $new_email = $request->input('email');
        $new_password = $request->input('password');
        $type = $request->input('type');
        $status = $request->input('status');
        
        
        $hash_password = Hash::make($new_password);
        $user = User::find($id);

        $user->email = $new_email;
        if($new_password != null){
            $user->password = $hash_password;
        }

        $user->type = $type;
        $user->status = $status;
        $user->save();

    }
}
