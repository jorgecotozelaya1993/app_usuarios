<?php

namespace App\Http\Controllers;

use App\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    
    public function index(){
       //$users = DB::table('users')->get();
       
       //$users = User::paginate(4);
       $users = User::all();
       $titulo ='Informe de Usuarios';
      
        return view('users.index', 
        [
               'users' => $users,
               'title' => $titulo    
       ]);
    }

   public function show($id){
          $user = User::findOrFail($id);
          return view('users.show', compact('user'));
   }

   public function create(){
          
         $categoria = Profession::all(); 
          return view('users.create', compact('categoria'));
   }

   public function store(){
       
       $data = request()->validate([
              'name' => 'required',
              'email' => ['required', 'email', 'unique:users,email'],
              'profession_id' => 'required',
              'password' => 'required'
       ],
       [
              'name.required' => 'El campo nombre es obligatorio',
              'email.required' => 'El campo email es obligatorio',
              'password.required' => 'El campo password es obligatirio',
              'profession_id.required' => 'El campo id Profesion es obligatirio'
       ]
       );


       //if (empty($data['name'])){
       //       return redirect('/usuarios/nuevo')->withErrors([
       //              'name' => 'El campo nombre es obligatorio'
       //       ]);
       // }


       User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'profession_id' => $data['profession_id'],
              'password' => bcrypt($data['password'])
       ]);

       return redirect('/usuarios/');
       //return 'Procesando informacion';
   }


   public function editar(User $user){
          return view('users.editar', ['user' => $user]);
   }

   public function actualizar(User $user){
       $data = request()->all();
       $data['password'] = bcrypt($data['password']);
       $user->update($data);
       return redirect("/usuarios/{$user->id}");
   }

   public function destroy(User $user){
       $user->delete();
       return redirect("usuarios");
   }


}
