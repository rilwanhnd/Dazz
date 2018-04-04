<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

    protected $table = 'userrole';
    protected $fillable = array('work_roal','note','status');

}
