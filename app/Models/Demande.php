<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $table= 'demandes';
    protected $guarded=[];

    public function elements(){

        return $this->hasMany(Element::class);
    }

    public function chefSections(){

        return $this->hasMany(ChefSection::class);
    }
}
