<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefSection extends Model
{
    use HasFactory;

    protected $table= 'chef_sections';

    public function elements(){

        return $this->hasMany(Element::class);
    }

    public function demandes(){

        return $this->hasMany(Demande::class);
    }
    public function compte_rendus(){

        return $this->hasMany(CompteRendu::class);
    }
}
