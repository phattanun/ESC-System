<?php

use Illuminate\Database\Seeder;
use \App\BorrowItem;

class BorrowItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BorrowItem::create([
            'list_id' => 1,
            'inv_id' => 1,
            'borrow_request_amount' => 5,
            'borrow_actual_amount' => null,
            'status' => 0,
            'approver_id' => null,
            'reason_if_not_approve' => null
        ]);
        BorrowItem::create([
            'list_id' => 1,
            'inv_id' => 2,
            'borrow_request_amount' => 5,
            'borrow_actual_amount' => null,
            'status' => 0,
            'approver_id' => null,
            'reason_if_not_approve' => null
        ]);
    }
}
