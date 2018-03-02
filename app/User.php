<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'token'
    ];

    /**
     * Fer que laravel converteixi valors als que deistgem.
     *
     * @var array
     */
    protected $casts = [
        // 'nomCol'  => 'boolean',
    ];

    /**
     * Retirna true si l'usuari és verificat.
     *
     * @return boolean
     */
    public function verified()
    {
        return $this->token === null;
    }

    /**
     * Enviar la verificació del correu a l'usuari.
     *
     * @return void
     */
    public function sendVerificationEmail()
    {
        $this->notify(new VerifyEmail($this));
    }
}
