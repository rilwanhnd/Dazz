<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model {

    protected $table = 'login_history';
    protected $fillable = array('user_id', 'ip_address','logintime');

}
