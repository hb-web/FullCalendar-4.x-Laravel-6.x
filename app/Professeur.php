<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = ['CIN','name','prenom','télé','email','matiere','vraiPassword','password'];
}
