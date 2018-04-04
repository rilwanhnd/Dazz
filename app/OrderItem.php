<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $table = 'orderitem';
    protected $fillable = array('order_id', 'userrole_id','status');

}
