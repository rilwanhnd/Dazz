<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configs extends Model {

    protected $table = 'configs';
    protected $fillable = array('mailaddress','host','password','port');

}
