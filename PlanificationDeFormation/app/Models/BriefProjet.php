<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
