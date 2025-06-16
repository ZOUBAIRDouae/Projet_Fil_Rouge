<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = ['nom', 'description' , 'plan_annuel_id'];

    public function plans(){
        return $this->belongsTo(PlanAnnuel::class);
    }

    public function modules() {
        return $this->belongsTo(Module::class);
    }
    
}
