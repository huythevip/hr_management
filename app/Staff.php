<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    //
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }
}
