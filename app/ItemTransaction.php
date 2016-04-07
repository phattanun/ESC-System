<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    protected $table = 'items_transaction';
    protected $primaryKey = 'ret_id';
    public $timestamps = false;
}
