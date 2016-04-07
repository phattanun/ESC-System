<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowList extends Model
{
    protected $table = 'borrow_lists';
    protected $primaryKey = 'list_id';
    protected $fillable = ['list_id','status','creator_id','div_id','other_div','act_id','other_act','reason','create_at','borrow_date','return_date'];
    public $timestamps = false;

    public function itemList(){
        return $this->belongsToMany('App\Inventory','borrow_items','list_id','inv_id');
    }
}
