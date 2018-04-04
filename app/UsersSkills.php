<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersSkills extends Model {

    protected $table = 'userskills';
    protected $fillable = array('users_id','userrole_id');

}
