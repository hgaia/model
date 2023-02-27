<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function login(){
        return Inertia::render('Login', [
            'title' => "teste",
        ]);
    }

    public function home(){
        $user = Auth::user();
        
        return Inertia::render('Home', [
            'title' => "teste",
            'user'=> $user,
        ]);
    }
    public function logar(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
    }
    public function createUser()
    {
        $user = Auth::user();

        return Inertia::render('CreateUser', [
            'title'     =>      "Cadastro de Usuário",
            'user'      =>      $user
        ]);
    }
    public function viewUsers()
    {
        $user = Auth::user();

        $all_users = User::where('type','<>',99)->get();

        foreach($all_users as $key => $u)
        {
            $data_base = date('d/m/Y',strtotime($u->created_at));

            $all_users[$key]['data_criacao'] = $data_base;
        }

        return Inertia::render('Users', [
            'title'     =>      "Usuários Cadastrados",
            'user'      =>      $user,
            'all_users' =>      $all_users,
        ]);
    }
    public function editUser($id)
    {
        $user = Auth::user();
        $user_edits = User::where('id',$id)->first();


        return Inertia::render('EditUser', [
            'title'             =>      "Usuário",
            'user'              =>      $user,
            'user_edits'        =>      $user_edits,
        ]);
    }
}
