<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAnnuel extends Model
{
    protected $fillable = ['date_debut', 'date_fin', 'filiere'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function BriefProjet()
    {
        return $this->hasMany(BriefProjet::class);
    }
}
