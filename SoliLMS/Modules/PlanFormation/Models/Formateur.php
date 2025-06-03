<?php

namespace Modules\PlanFormation\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Formateur extends Model
{
    use HasRoles;
    
    protected $fillable = ['user_id','nom', 'prenom', 'email', 'telephone', 'motDePasse'];

    protected $hidden = ['motDePasse'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
