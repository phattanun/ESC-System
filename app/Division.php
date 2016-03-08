<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
    protected $primaryKey = 'div_id';
    public $timestamps = false;
}
