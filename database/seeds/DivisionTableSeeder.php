<?php

use Illuminate\Database\Seeder;
use \App\Division;
class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create(['div_id'=>0,'name'=>'-','type'=>'Generation']);
        Division::create(['div_id'=>96 ,'name'=>'96','type'=>'Generation']);
        Division::create(['div_id'=>97 ,'name'=>'97','type'=>'Generation']);
        Division::create(['div_id'=>98 ,'name'=>'98','type'=>'Generation']);
        Division::create(['div_id'=>99 ,'name'=>'99','type'=>'Generation']);
        Division::create(['div_id'=>100,'name'=>'100','type'=>'Generation']);
        Division::create(['div_id'=>101,'name'=>'101','type'=>'Generation']);

        Division::create(['div_id'=>1000,'name'=>'-','type'=>'Group']);
        Division::create(['div_id'=>1001,'name'=>'A','type'=>'Group']);
        Division::create(['div_id'=>1002,'name'=>'B','type'=>'Group']);
        Division::create(['div_id'=>1003,'name'=>'C','type'=>'Group']);
        Division::create(['div_id'=>1004,'name'=>'D','type'=>'Group']);
        Division::create(['div_id'=>1005,'name'=>'E','type'=>'Group']);
        Division::create(['div_id'=>1006,'name'=>'F','type'=>'Group']);
        Division::create(['div_id'=>1007,'name'=>'G','type'=>'Group']);

        Division::create(['div_id'=>100000,'name'=>'-','type'=>'Department']);
        Division::create(['div_id'=>100001,'name'=>'Computer','type'=>'Department']);
    }
}