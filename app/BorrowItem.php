<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowItem extends Model
{
    protected $table = 'borrow_items';
    public $timestamps = false;
    protected $fillable = ['list_id','inv_id','borrow_request_amount','borrow_actual_amount','borrow_date','return_date','status','approver_id','giver_id','reason_if_not_approve'];

    public function borrowList(){
        return $this->belongsToMany('App\Inventory');
    }
}
