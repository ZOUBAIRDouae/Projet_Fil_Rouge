<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\PlanFormation\Models\Module;

class BriefProjet extends Model
{
    protected $fillable = ['titre', 'description', 'statut', 'module_id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
