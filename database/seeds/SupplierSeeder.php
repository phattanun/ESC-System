<?php

use Illuminate\Database\Seeder;
use \App\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name'=>'จีฉ่อย',
            'inv_id'=>'1',
            'address'=>'32/25 ถนนพระราม4 แขวงปทุมวัน เขตพญาไท กรุงเทพฯ 10111',
            'phone_no'=>'085-555-5566'
        ]);
        Supplier::create([
            'name'=>'สมใจ',
            'inv_id'=>'2',
            'address'=>'45/23-5 ถนนพญาไท แขวงพญาไท เขตพญาไท กรุงเทพฯ 11000',
            'phone_no'=>'085-656-6666'
        ]);
    }
}
