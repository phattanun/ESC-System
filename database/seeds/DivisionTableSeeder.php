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
        Division::create(['div_id'=>96 ,'name'=>'96','type'=>'Generation']);
        Division::create(['div_id'=>97 ,'name'=>'97','type'=>'Generation']);
        Division::create(['div_id'=>98 ,'name'=>'98','type'=>'Generation']);
        Division::create(['div_id'=>99 ,'name'=>'99','type'=>'Generation']);
        Division::create(['div_id'=>100,'name'=>'100','type'=>'Generation']);
        Division::create(['div_id'=>101,'name'=>'101','type'=>'Generation']);

        Division::create(['div_id'=>1001,'name'=>'A','type'=>'Group']);
        Division::create(['div_id'=>1002,'name'=>'B','type'=>'Group']);
        Division::create(['div_id'=>1003,'name'=>'C','type'=>'Group']);
        Division::create(['div_id'=>1004,'name'=>'D','type'=>'Group']);
        Division::create(['div_id'=>1005,'name'=>'E','type'=>'Group']);
        Division::create(['div_id'=>1006,'name'=>'F','type'=>'Group']);
        Division::create(['div_id'=>1007,'name'=>'G','type'=>'Group']);

        Division::create(['div_id'=>100000,'name'=>'วิศวกรรมทั่วไป','type'=>'Department']);
        Division::create(['div_id'=>100001,'name'=>'วิศวกรรมคอมพิวเตอร์','type'=>'Department']);
        Division::create(['div_id'=>100002,'name'=>'วิศวกรรมเคมี','type'=>'Department']);
        Division::create(['div_id'=>100003,'name'=>'วิศวกรรมเครื่องกล','type'=>'Department']);
        Division::create(['div_id'=>100004,'name'=>'วิศวกรรมปิโตรเลียม','type'=>'Department']);
        Division::create(['div_id'=>100005,'name'=>'วิศวกรรมไฟฟ้า','type'=>'Department']);
        Division::create(['div_id'=>100006,'name'=>'วิศวกรรมทรัพยากรธรณี','type'=>'Department']);
        Division::create(['div_id'=>100007,'name'=>'วิศวกรรมยานยนต์','type'=>'Department']);
        Division::create(['div_id'=>100008,'name'=>'วิศวกรรมโยธา','type'=>'Department']);
        Division::create(['div_id'=>100009,'name'=>'วิศวกรรมเรือ','type'=>'Department']);
        Division::create(['div_id'=>100010,'name'=>'วิศวกรรมโลหการและวัสดุ','type'=>'Department']);
        Division::create(['div_id'=>100011,'name'=>'วิศวกรรมสำรวจ','type'=>'Department']);
        Division::create(['div_id'=>100012,'name'=>'วิศวกรรมสิ่งแวดล้อม','type'=>'Department']);
        Division::create(['div_id'=>100013,'name'=>'วิศวกรรมอุตสาหการ','type'=>'Department']);
        Division::create(['div_id'=>100014,'name'=>'วิศวกรรมการออกแบบและการผลิตยานยนต์ (หลักสูตรนานาชาติ)','type'=>'Department']);
        Division::create(['div_id'=>100015,'name'=>'วิศวกรรมนาโน(หลักสูตรนานาชาติ)','type'=>'Department']);
        Division::create(['div_id'=>100016,'name'=>'วิศวกรรมสารสนเทศและการสื่อสาร (หลักสูตรนานาชาติ)','type'=>'Department']);
        Division::create(['div_id'=>100017,'name'=>'วิศวกรรมอากาศยาน(หลักสูตรนานาชาติ)','type'=>'Department']);
    }
}
