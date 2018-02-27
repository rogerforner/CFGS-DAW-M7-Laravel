<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Fer que laravel converteixi valors als que deistgem.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean'
    ];

    /**
     * Rols usuaris (bàsic).
     *
     * Definim unes funcions amb les que definir, de forma extremadament bàsica
     * els rols dels usuaris -> UserSeeder.
     */
    public function isAdmin()
    {
        return $this->email === 'admin@example.com';
    }

    public function isWorker()
    {
        return $this->email === 'worker@example.com';
    }
}
