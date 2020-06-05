<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //campos que seram salvos
    protected $fillable = ['nome'];
}
