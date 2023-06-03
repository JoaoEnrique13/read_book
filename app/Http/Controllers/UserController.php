<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $dados = $request->only(['name', 'email', 'password']);
        $dados['password'] = Hash::make($dados['password']);

        User::create($dados);

        return redirect()->route('login');
    }


    public function login(Request $request)
    {
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //$admin = Admin::where('idUsuario', $dados->id)->get();

        if (Auth::attempt($dados, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('');
        }


        return back()->withErrors([
            'email' => 'O email e/ou senha não são invalidos'
        ]);
    }

    /**
     * Realiza logout do usuário
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function conta()    {
        $user = auth()->user();
        
        return view('conta.conta', ['user' => $user]);
    }

    public function isAdmin(){            
        $user = auth()->user();

        if(auth()->check()){
            $admin = Admin::where('idUsuario', $user->id)->get();
            return count($admin);
        }

        return 0;
    }

    public function listAdmin(){
        // $admin = Admin::get();
        // $idAdmin = $admin;
        // $users = User::where("id", $idAdmin)->get();
        $admins = Admin::get();
        $admin = [];
            foreach($admins as $cont){

                $new = Admin::
                select('*')
                ->join('users', 'users.id', '=', 'admins.idUsuario')
                ->where('users.id', $cont->idUsuario)
                ->get();

                array_push($admin, $new );
            }

            $hello = "";
            for($i=0; $i<count($admin); $i++){
                $hello = $hello . $admin[$i][0];
            }
        //$users = User::where("id", $idAdmin)->get();

        return view("admin.listar_admins", ['admins' => $hello]);
    }

    public function listUser(){
        $users = User::get();

        return view("admin.listar_usuarios", ['users' => $users]);
    }

    public function deleteUser($id){
        try{
            $user = User::where('id', $id)->delete();
            return redirect('/consulta?exc=sucess');
            return $id;
        }catch(Exeption $e){
            //return redirect('/consulta?exc=danger');
        }
    }


    public function update(Request $request){
        try{
            $user = auth()->user();
            $erro = 0;

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
    
            $dados = $request->only(['name', 'email', 'password']);
            $dados['password'] = Hash::make($dados['password']);
    
            User::where('id', $request->id)->update($dados);
            
            return view("conta.conta", ['user' => $user, 'erro' => $erro]);
        
        }
        catch(Exeption $e){
            $erro = 1;
            return view("conta.conta", ['livro' => $livro, 'erro' => $erro]);
        }
    }
}
