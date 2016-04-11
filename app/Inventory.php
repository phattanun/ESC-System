<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $primaryKey = 'inv_id';
    public $timestamps = false;

    protected $fillable=['name','type','image','unit','price_per_unit','total_qty','remain_qty','editor_id','edit_at'];
}
