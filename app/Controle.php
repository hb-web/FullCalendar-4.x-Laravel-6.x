<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    protected $fillable = ['nomControle','controle_PDF','solution_PDF','lign_class_prof','lign_class_prof', 'matiere','description'];

}
