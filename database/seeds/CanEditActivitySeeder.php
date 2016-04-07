<?php

use Illuminate\Database\Seeder;
use App\CanEditActivity;

class CanEditActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CanEditActivity::create(['act_id'=>1,'student_id'=>2]);
        // CanEditActivity::create(['act_id'=>1,'student_id'=>5631002321]);
        // CanEditActivity::create(['act_id'=>1,'student_id'=>5631008121]);
        // CanEditActivity::create(['act_id'=>1,'student_id'=>5631009821]);
        // CanEditActivity::create(['act_id'=>2,'student_id'=>5631002321]);
        // CanEditActivity::create(['act_id'=>2,'student_id'=>5631011021]);
    }
}
