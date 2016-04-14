<?php

use Illuminate\Database\Seeder;
use \App\ItemTransaction;

class ItemTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ItemTransaction::create(['list_id'=>1,'inv_id'=>1,'amount'=>5,'type'=>0,'staff_id'=>1,'date'=>\Carbon\Carbon::now(),'remain_qty'=>10]);
        ItemTransaction::create(['list_id'=>1,'inv_id'=>1,'amount'=>5,'type'=>1,'staff_id'=>1,'date'=>\Carbon\Carbon::now(),'remain_qty'=>15]);
    }
}
