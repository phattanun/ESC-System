<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventorySupplier extends Model
{
    protected $table = 'inventories_suppliers';
    public $timestamps = false;
    protected $fillable=['inv_id','supplier_id','unit','price_per_unit'];
}
