<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    /**
     * Verificar l'usuari amb un token.
     * @param  string $token
     * @return Response
     */
    public function verify($token)
    {
        User::where('token', $token)->firstOrFail()
            ->update(['token' => null]); // Verificar usuari.

        return redirect()->route('home')->with('success', 'Compte verificat');
    }
}
