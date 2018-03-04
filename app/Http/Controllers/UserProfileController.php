<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('user.show', ['user' => $user]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('user.edit', ['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
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

        return redirect()->route('user.show', ['user' => $user]);
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

        return redirect()->route('shop');
    }
}
