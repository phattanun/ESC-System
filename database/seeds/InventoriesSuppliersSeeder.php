<?php

use Illuminate\Database\Seeder;
use \App\InventorySupplier;

class InventoriesSuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InventorySupplier::create([
            'inv_id'=> 1,
            'supplier_id'=> 1,
            'unit'=> 'แท่ง',
            'price_per_unit'=> 25
        ]);
        InventorySupplier::create([
            'inv_id'=> 1,
            'supplier_id'=> 2,
            'unit'=> 'ด้าม',
            'price_per_unit'=> 30
        ]);
        InventorySupplier::create([
            'inv_id'=> 2,
            'supplier_id'=> 1,
            'unit'=> 'ก้อน',
            'price_per_unit'=> 10
        ]);
        InventorySupplier::create([
            'inv_id'=> 2,
            'supplier_id'=> 2,
            'unit'=> 'อัน',
            'price_per_unit'=> null
        ]);
    }
}
