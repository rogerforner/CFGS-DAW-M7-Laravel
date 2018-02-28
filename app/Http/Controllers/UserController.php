<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtenir un array amb tots els usuaris.
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Obtenir les dades del formulari.
        // I validar els camps.
        $data = request()->validate([
          'name'     => 'required',
          'email'    => ['required', 'email', 'unique:users,email'], // unique:taula,columna
          'password' => 'required'
        ]);

        // Crear usuari amb les dades entrades.
        User::create([
          'name'     => $data['name'],
          'email'    => $data['email'],
          'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar usuari per la seva ID.
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     * Podem passar objecte User ELOQUENT i sap trobar ID ell sol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Retornar vista ID usuari en concret.
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Obtenir les dades de l'usuari.
        $user = User::findOrFail($id);

        // Validar formulari.
        $data = request()->validate([
          'name'     => 'required',
          'email'    => ['required', 'email'],
          'password' => 'required'
        ]);

        // Encriptar password pq sinó ens dóna un error.
        $data['password'] = bcrypt($data['password']);

        // Actualitzar dades.
        $user->update($data);

        return redirect()->action('UserController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
