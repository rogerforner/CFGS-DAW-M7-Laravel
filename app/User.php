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
        return $this->is_admin;
    }

    public function isWorker()
    {
        return $this->is_worker;
    }

    /**
     * Relacions
     *
     * Un usuari pertany a una professió.
     * Per defecte es busca "profession_id" tot i que si no estat nombrat, el
     * camp, així, es pot passar com a segon argument:
     * belongsTo(Profession::class, 'id_profession').
     */
    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
