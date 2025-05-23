<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAnnuel extends Model
{
    protected $fillable = ['date_debut', 'date_fin', 'filiere'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
