<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'motDePasse'];

    protected $hidden = ['motDePasse'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
