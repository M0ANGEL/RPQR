<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos enviados desde el frontend
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'bodega' => 'required',
            'perfil' => 'required',
            'password' => 'required',
        ]);

        $usuares = User::create($request->all());

        return "Usuario Creado Correctamente";
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
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

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
