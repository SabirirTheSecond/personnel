<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteRendu extends Model
{
    use HasFactory;
    
    protected $table= 'compte_rendus';
    protected $guarded=[];


    public function elements(){

        return $this->hasMany(Element::class);
    }

    public function chefSections(){

        return $this->hasMany(ChefSection::class);
    }
}
