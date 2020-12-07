<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{

    protected $fillable = ['nom_exam','filiere','description_exam','prof','file_exam','file_corection'];

     
     

}
