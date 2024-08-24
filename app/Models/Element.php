<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    public function chefSection(){
        
        return $this->belongsTo(ChefSection::class);

    }

    public function demandes(){

        return $this->hasMany(Demande::class);
    }
    public function compte_rendus(){

        return $this->hasMany(CompteRendu::class);
    }
}
