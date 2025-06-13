<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['nom', 'description' , 'plan_annuel_id'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function briefProjets()
    {
        return $this->hasMany(BriefProjet::class);
    }

    public function competences(){
        return $this->hasMany(Competence::class);
    }

    public function plans(){
        return $this->belongsTo(PlanAnnuel::class);
    }
}
