<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAnnuel extends Model
{
    protected $fillable = ['date_debut', 'date_fin', 'filiere' , 'formateur_id'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class , 'plan_annuel_id');
    }

    public function briefProjets()
    {
        return $this->hasMany(BriefProjet::class , 'plan_annuel_id');
    }

    public function competences(){
        return $this->hasMany(Competence::class , 'plan_annuel_id');
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function evaluationsModules()
{
    return $this->hasManyThrough(Evaluation::class, Module::class, 'plan_annuel_id', 'module_id', 'id', 'id');
}

public function evaluationsBriefs()
{
    return $this->hasManyThrough(Evaluation::class, BriefProjet::class, 'plan_annuel_id', 'brief_projet_id', 'id', 'id');
}

    
}
