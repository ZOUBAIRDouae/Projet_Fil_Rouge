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
        return $this->hasMany(BriefProjet::class , 'module_id');
    }

    public function competences(){
        return $this->hasMany(Competence::class , 'module_id');
    }

    public function plans(){
        return $this->belongsTo(PlanAnnuel::class);
    }

    public function evaluations()
    { 
        return $this->hasMany(Evaluation::class , 'module_id');
    }



}
