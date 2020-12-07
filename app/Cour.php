<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    protected $fillable = ['nomCour','description','PDF','typeVideo','video','matiere','prof'];

        
}
