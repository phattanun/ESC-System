<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    protected $table = 'items_transaction';
    protected $primaryKey = 'transaction_id';
    protected $fillable = ['list_id','inv_id','amount','type','staff_id','date','remain_qty'];
    public $timestamps = false;
}
