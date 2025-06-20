<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['type', 'module_id' ,  'brief_projet_id'];

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }
    public function briefProjets()
    {
        return $this->belongsTo(BriefProjet::class);
    }
}
