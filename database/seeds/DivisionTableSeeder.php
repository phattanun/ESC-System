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
        Division::create(['div_id'=>96 ,'name'=>'96','type'=>'Generation','short_name'=>'96']);
        Division::create(['div_id'=>97 ,'name'=>'97','type'=>'Generation','short_name'=>'97']);
        Division::create(['div_id'=>98 ,'name'=>'98','type'=>'Generation','short_name'=>'98']);
        Division::create(['div_id'=>99 ,'name'=>'99','type'=>'Generation','short_name'=>'99']);
        Division::create(['div_id'=>100,'name'=>'100','type'=>'Generation','short_name'=>'100']);
        Division::create(['div_id'=>101,'name'=>'101','type'=>'Generation','short_name'=>'101']);

        Division::create(['div_id'=>1001,'name'=>'A','type'=>'Group','short_name'=>'A']);
        Division::create(['div_id'=>1002,'name'=>'B','type'=>'Group','short_name'=>'B']);
        Division::create(['div_id'=>1003,'name'=>'C','type'=>'Group','short_name'=>'C']);
        Division::create(['div_id'=>1004,'name'=>'D','type'=>'Group','short_name'=>'D']);
        Division::create(['div_id'=>1005,'name'=>'E','type'=>'Group','short_name'=>'E']);
        Division::create(['div_id'=>1006,'name'=>'F','type'=>'Group','short_name'=>'F']);
        Division::create(['div_id'=>1007,'name'=>'G','type'=>'Group','short_name'=>'G']);
        Division::create(['div_id'=>1008,'name'=>'H','type'=>'Group','short_name'=>'H']);
        Division::create(['div_id'=>1009,'name'=>'J','type'=>'Group','short_name'=>'J']);
        Division::create(['div_id'=>1010,'name'=>'K','type'=>'Group','short_name'=>'K']);
        Division::create(['div_id'=>1011,'name'=>'L','type'=>'Group','short_name'=>'L']);
        Division::create(['div_id'=>1012,'name'=>'M','type'=>'Group','short_name'=>'M']);
        Division::create(['div_id'=>1013,'name'=>'N','type'=>'Group','short_name'=>'N']);
        Division::create(['div_id'=>1014,'name'=>'P','type'=>'Group','short_name'=>'P']);
        Division::create(['div_id'=>1015,'name'=>'Q','type'=>'Group','short_name'=>'Q']);
        Division::create(['div_id'=>1016,'name'=>'R','type'=>'Group','short_name'=>'R']);
        Division::create(['div_id'=>1017,'name'=>'S','type'=>'Group','short_name'=>'S']);
        Division::create(['div_id'=>1018,'name'=>'T','type'=>'Group','short_name'=>'T']);

        Division::create(['div_id'=>10001,'name'=>'Clique','type'=>'Club','short_name'=>'']);
        Division::create(['div_id'=>10002,'name'=>'ค่ายลานเกียร์','type'=>'Club','short_name'=>'']);

        Division::create(['div_id'=>100000,'name'=>'วิศวกรรมทั่วไป','type'=>'Department','short_name'=>'ENG']);
        Division::create(['div_id'=>100001,'name'=>'วิศวกรรมคอมพิวเตอร์','type'=>'Department','short_name'=>'CP']);
        Division::create(['div_id'=>100002,'name'=>'วิศวกรรมเคมี','type'=>'Department','short_name'=>'CHE']);
        Division::create(['div_id'=>100003,'name'=>'วิศวกรรมเครื่องกล','type'=>'Department','short_name'=>'ME']);
        Division::create(['div_id'=>100004,'name'=>'วิศวกรรมปิโตรเลียม','type'=>'Department','short_name'=>'PE']);
        Division::create(['div_id'=>100005,'name'=>'วิศวกรรมไฟฟ้า','type'=>'Department','short_name'=>'EE']);
        Division::create(['div_id'=>100006,'name'=>'วิศวกรรมทรัพยากรธรณี','type'=>'Department','short_name'=>'MN']);
        Division::create(['div_id'=>100007,'name'=>'วิศวกรรมยานยนต์','type'=>'Department','short_name'=>'AE']);
        Division::create(['div_id'=>100008,'name'=>'วิศวกรรมโยธา','type'=>'Department','short_name'=>'CE']);
        Division::create(['div_id'=>100009,'name'=>'วิศวกรรมเรือ','type'=>'Department','short_name'=>'MR']);
        Division::create(['div_id'=>100010,'name'=>'วิศวกรรมโลหการและวัสดุ','type'=>'Department','short_name'=>'MT']);
        Division::create(['div_id'=>100011,'name'=>'วิศวกรรมสำรวจ','type'=>'Department','short_name'=>'SV']);
        Division::create(['div_id'=>100012,'name'=>'วิศวกรรมสิ่งแวดล้อม','type'=>'Department','short_name'=>'ENV']);
        Division::create(['div_id'=>100013,'name'=>'วิศวกรรมอุตสาหการ','type'=>'Department','short_name'=>'IE']);
        Division::create(['div_id'=>100014,'name'=>'วิศวกรรมการออกแบบและการผลิตยานยนต์ (หลักสูตรนานาชาติ)','type'=>'Department','short_name'=>'ADME']);
        Division::create(['div_id'=>100015,'name'=>'วิศวกรรมนาโน (หลักสูตรนานาชาติ)','type'=>'Department','short_name'=>'NANO']);
        Division::create(['div_id'=>100016,'name'=>'วิศวกรรมสารสนเทศและการสื่อสาร (หลักสูตรนานาชาติ)','type'=>'Department','short_name'=>'ICE']);
        Division::create(['div_id'=>100017,'name'=>'วิศวกรรมอากาศยาน (หลักสูตรนานาชาติ)','type'=>'Department','short_name'=>'AERO']);
    }
}
