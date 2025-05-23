<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = [
        'date_debut',
        'date_fin',
        'num_semaine',
        'heures',
        'plan_annuel_id',
        'formateur_id',
        'module_id',
    ];

    public function planAnnuel()
    {
        return $this->belongsTo(PlanAnnuel::class);
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
