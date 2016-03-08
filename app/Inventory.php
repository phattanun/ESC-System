<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $primaryKey = 'inv_id';
    public $timestamps = false;
}
