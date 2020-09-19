<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersBluetoothToken extends Model
{
    protected $table = 'usersbluetoothtoken';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
