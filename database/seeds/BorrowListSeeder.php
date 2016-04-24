<?php

use Illuminate\Database\Seeder;
use \App\BorrowList;

class BorrowListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BorrowList::create([
            'status'=> 0,
            'creator_id'=> 1,
            'div_id'=> 97,
            'other_div'=> null,
            'act_id'=> 1,
            'other_act'=> null,
            'reason' => "เพิ่มลดพัสดุของกวศ",
            'create_at'=> \Carbon\Carbon::now(),
            'borrow_date'=> \Carbon\Carbon::now(),
            'return_date'=>\Carbon\Carbon::now()
        ]);
        BorrowList::create([
            'status'=> 0,
            'creator_id'=> 1,
            'div_id'=> 97,
            'other_div'=> null,
            'act_id'=> 1,
            'other_act'=> null,
            'reason' => "อยาก",
            'create_at'=> \Carbon\Carbon::now(),
            'borrow_date'=> \Carbon\Carbon::now(),
            'return_date'=>\Carbon\Carbon::now()
        ]);
    }
}
