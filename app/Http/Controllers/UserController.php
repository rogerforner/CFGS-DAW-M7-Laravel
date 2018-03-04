<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PDF;

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
        $user = User::create([
          'name'     => $data['name'],
          'email'    => $data['email'],
          'password' => bcrypt($data['password'])
        ]);

        // Determinar si serà creat un administrador, un treballador o un client.
        if ($request->role === 'admin') {
            $user->assignRole('admin');
        } elseif ($request->role === 'worker') {
            $user->assignRole('worker');
        } else {
            $user->assignRole('client');
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
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
    public function update(Request $request, User $user)
    {
        // Validar formulari.
        $data = request()->validate([
          'name'     => 'required',
          'email'    => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id) // Ignorem email del propi usuari.
          ],
          'password' => ''
        ]);

        // El password serà opcional.
        if ($data['password'] != null) {
            // Encriptar password pq sinó ens dóna un error.
            $data['password'] = bcrypt($data['password']);
        } else {
            // Treiem del array $data el password.
            unset($data['password']);
        }

        // Actualitzar dades.
        $user->update($data);

        // Determinar si serà creat un administrador, un treballador o un client.
        if ($request->role === 'admin') {
            $user->syncRoles('admin');
        } elseif ($request->role === 'worker') {
            $user->syncRoles('worker');
        } elseif ($request->role === 'client') {
            $user->syncRoles('client');
        }

        return redirect()->route('users.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Obtenir un PDF amb el llistat d'usuaris.
     */
    public function pdf(Request $request)
    {
        // Dur a terme la consulta segons el paràmetre passat per la URL.
        if ($request->view_type === 'name-asc') {
            // Informació.
            $info     = 'Ordenats alfabèticament per "Nom" de forma ascendent.';
            $fileName = 'usuaris-usuaris-nomAsc';

            // Consulta.
            $users = User::orderBy('name', 'asc')
                ->get();
        } elseif ($request->view_type === 'name-desc') {
            // Informació.
            $info     = 'Ordenats alfabèticament per "Nom" de forma descendent.';
            $fileName = 'usuaris-nomDesc';

            // Consulta.
            $users = User::orderBy('name', 'desc')
                ->get();
        } elseif ($request->view_type === 'id-asc') {
            // Informació.
            $info     = 'Ordenats per "ID" de forma ascendent.';
            $fileName = 'usuaris-idAsc';

            // Consulta.
            $users = User::orderBy('id', 'asc')
                ->get();
        } elseif ($request->view_type === 'id-desc') {
            // Informació.
            $info     = 'Ordenats per "ID" de forma descendent.';
            $fileName = 'usuaris-idDesc';

            // Consulta.
            $users = User::orderBy('id', 'desc')
                ->get();
        } elseif ($request->view_type === 'updated-g-asc') {
            // Informació.
            $info     = 'Agrupats per "Data actualització" i ordenats de forma ascendent.';
            $fileName = 'usuaris-gUpAsc';

            // Consulta.
            $users = User::orderBy('updated_at', 'asc')
                ->groupBy('updated_at')
                ->get();
        } else {
            // Informació.
            $info     = 'Agrupats per "Data actualització" i ordenats de forma descendent.';
            $fileName = 'usuaris-gUpDesc';

            // Consulta.
            // Una altra manera de fer la consulta (hem importat "use" DB).
            $users = DB::table('users')
                ->groupBy('updated_at')
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        // Carregar la vista per obtenir el format del PDF amb les seves dades.
        $pdf = PDF::loadView('users.pdf', [
            'users' => $users,
            'info'  => $info,
        ]);

        // Posar un nom al fitxer.
        $file = "$fileName.pdf";

        return $pdf->download($file);
    }
}
