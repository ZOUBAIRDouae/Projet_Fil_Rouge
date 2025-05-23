<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['type', 'brief_projet_id'];

    public function briefProjet()
    {
        return $this->belongsTo(BriefProjet::class);
    }
}
