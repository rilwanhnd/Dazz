<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model {

    protected $table = 'orderuser';
    protected $fillable = array('orderitem_id', 'users_id', 'status', 'note', 'cancel_date', 'assign_date', 'complete_date');

}
