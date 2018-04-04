<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteHistory extends Model {

    protected $table = 'note_history';
    protected $fillable = array('orderitem_id', 'users_id', 'note', 'date', 'status');

}
