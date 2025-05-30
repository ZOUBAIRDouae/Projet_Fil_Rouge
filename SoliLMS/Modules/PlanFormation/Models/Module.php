<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['nom', 'description'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function briefProjets()
    {
        return $this->hasMany(BriefProjet::class);
    }
}
