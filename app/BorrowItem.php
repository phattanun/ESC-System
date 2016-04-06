<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowItem extends Model
{
    protected $table = 'borrow_items';
    public $timestamps = false;

    public function borrowList(){
        return $this->belongsToMany('App\Inventory');
    }
}
