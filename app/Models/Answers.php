<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = 'answers';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
