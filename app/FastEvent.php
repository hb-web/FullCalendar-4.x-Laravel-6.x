<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FastEvent extends Model
{
    use SoftDeletes;

    protected $fillable = ['filiere', 'title','start', 'end', 'color'];
}
