<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin\bodega;
use App\Models\Agotados\Agotados;
use App\Models\huv\huv;
use App\Models\mipres\Entregas;
use App\Models\mipres\Mipres;
use App\Models\Tikes\Tike;
use App\Models\User;
use App\Models\vistaMedica\vista;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\SimpleType\Zoom;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');
        $users = User::orderBy('id', 'desc')->/* table('users') */select('id', 'name', 'email', 'perfil', 'bodega')
            ->where('name', 'like', '%' . $busqueda . '%')
            ->orwhere('email', 'like', '%' . $busqueda . '%')
            ->orwhere('bodega', 'like', '%' . $busqueda . '%')
            ->orwhere('perfil', 'like', '%' . $busqueda . '%')
            ->paginate(15);

        return view('admin.users.index', compact('users', 'busqueda'));
    }

    public function AllUsuarios(Request $request)
    {
        $busqueda = $request->get('text', '');
        $users = huv::orderBy('id', 'desc')->/* table('users') */select('*')
            ->where('name', 'like', '%' . $busqueda . '%')
            ->orwhere('cedula', 'like', '%' . $busqueda . '%')
            ->paginate(15);

        return view('admin.users.AllUsuarios', compact('users', 'busqueda'));
    }

    public function create()
    {
        $bodegas = bodega::all();
        return view('admin.users.create', compact('bodegas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'correo' => 'unique:users,email',
            'bodega' => 'required',
            'password' => 'required',
            'perfil',
        ]);

        $usuares = User::create($request->all());

        session()->flash('swal', [
            'icon' => 'succes',
            'title' => 'Bien hecho',
            'text' => 'El usuario se creo correctamente',
        ]);

        return redirect()->route('users.edit', $usuares);
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $bodegas = bodega::all();

        return view('admin.users.edit', compact('user', 'roles', 'bodegas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'bodega',
            'perfil',
            'email' => "required|string|email|unique:users,email,{$user->id}",
            'password' => 'nullable',  // Permitir que la contraseña sea opcional
        ]);

        // Actualizar solo los campos que se permiten actualizar directamente
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bodega = $request->bodega;
        $user->perfil = $request->perfil;

        // Si la contraseña fue proporcionada, encriptarla y actualizarla
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();  // Guardar los cambios en el usuario

        // Sincronizar roles
        $user->roles()->sync($request->roles);

        // Mensaje flash de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Se actualizó correctamente',
        ]);

        return redirect()->route('users.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El usuario se elimino correctamente'
        ]);

        return redirect()->route('users.index');
    }

    public function home()
    {
        $vista = vista::count();
        $Agotados = Agotados::where('estado', '=', 1)->count();
        $personas = Mipres::count();
        $mipres = Entregas::where('cantidad_restante', '!=', 0)->count();
        $tikes = Tike::where('estado', '!=', 3)->count();
        return view('dashboard', compact('vista', 'Agotados', 'personas', 'mipres', 'tikes'));
    }
}
