<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowList extends Model
{
    protected $table = 'borrow_lists';
    protected $primaryKey = 'list_id';
    public $timestamps = false;

    public function itemList(){
        return $this->belongsToMany('App\Inventory','borrow_items','list_id','inv_id');
    }
}
