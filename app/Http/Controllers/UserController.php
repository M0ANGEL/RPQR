<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin\bodega;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text','');
        $users = User::orderBy('id','desc')->/* table('users') */
        select('id','name','email','perfil','bodega')
        ->where('name','like','%'.$busqueda.'%')
        ->orwhere('email','like','%'.$busqueda.'%')
        ->orwhere('bodega','like','%'.$busqueda.'%')
        ->orwhere('perfil','like','%'.$busqueda.'%')
        ->paginate(8);

        return view('admin.users.index', compact('users','busqueda'));
    }

    public function create()
    {
        $bodegas = bodega::all();
        return view('admin.users.create',compact('bodegas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'correo'=>'unique:users,email',
            'bodega'=>'required',
            'password'=>'required',
            'perfil',
        ]);

        $usuares = User::create($request->all());

        session()->flash('swal',[
            'icon' => 'succes',
            'title'=>'Bien hecho',
            'text'=>'El usuario se creo correctamente',
        ]);

        return redirect()->route('users.edit',$usuares);
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>"required|string|email|unique:users,email,{$user->id}",
            'password'=>'nullable',
        ]);
        /* crear dato */ 

        $user->update($request->all());

       /*
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);*/

        /* actualizar contra ya que no se puede enviar nulla 
        if($user->password){
            $user->password = bcrypt($request->password);
        }*/

        $user->roles()->sync($request->roles);
        /* mensaje flash */
        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'¡Bien hecho!',
            'text'=>'se actualizo correctamente'
        ]);
        
        return redirect()->route('users.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        /* validacion si existe
        $posts = huv::where('user_id', $user->id)->exists();

        if($posts){ 
            session()->flash('swal',[
                'icon'=>'error',
                'title'=>'¡Error!',
                'text'=>'El usuario no se puede eliminar, esta en uso'
            ]);
            return redirect()->route('users.edit',$user);
        
        }else{
         */

            $user->delete();
         
            session()->flash('swal',[
            'icon'=>'success',
            'title'=>'¡Bien hecho!',
            'text'=>'El usuario se elimino correctamente'
        ]);

        return redirect()->route('users.index');

        
    }
}
