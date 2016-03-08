<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    protected $table = 'return_items';
    protected $primaryKey = 'ret_id';
    public $timestamps = false;
}
