<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowList extends Model
{
    protected $table = 'borrow_lists';
    protected $primaryKey = 'list_id';
    protected $fillable = ['list_id','status','creator_id','div_id','other_div','act_id','other_act','reason','create_at'];
    public $timestamps = false;

    public function itemList(){
        return $this->belongsToMany('App\Inventory','borrow_items','list_id','inv_id');
    }

    public function creator(){
        return $this->hasOne('App\User','student_id','creator_id');
    }

    public function activity(){
        return $this->hasOne('App\Activity','act_id','act_id');
    }

    public function division(){
        return $this->hasOne('App\Division','div_id','div_id');
    }
}
