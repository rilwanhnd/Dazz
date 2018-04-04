<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'order';
    protected $fillable = array('customer_name', 'create_date', 'need_by_date', 'address', 
        'tel', 'web', 'message', 'file_name', 'size', 'file_type', 'image_path',
        'note','email','output_image_path','frametype','headlinetext');

}
