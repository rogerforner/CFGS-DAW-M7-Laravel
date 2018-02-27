<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Relacions
     *
     * Una professió té molts d'usuaris.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
