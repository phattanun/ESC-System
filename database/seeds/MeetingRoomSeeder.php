<?php

use Illuminate\Database\Seeder;
use \App\MeetingRoom;
class MeetingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeetingRoom::create([
            'room_id'=>0,
            'name'=>'ไม่ระบุห้อง',
            'size'=>'ไม่จำกัด',
            'priority'=>0
        ]);
        MeetingRoom::create([
            'room_id'=>1,
            'name'=>'ห้องเขียว',
            'size'=>'ไม่จำกัด',
            'priority'=>1
        ]);
        MeetingRoom::create([
            'room_id'=>2,
            'name'=>'ห้องชมพู',
            'size'=>'ใหญ่กว่าห้องเขียว',
            'priority'=>2
        ]);
        MeetingRoom::create([
            'room_id'=>3,
            'name'=>'ห้องเก็บของ',
            'size'=>'เล็กมาก',
            'priority'=>3,
            'closed'=>true
        ]);
        MeetingRoom::create([
            'room_id'=>4,
            'name'=>'ห้องสวีท',
            'size'=>'1-3 คน',
            'priority'=>3
        ]);
        MeetingRoom::create([
            'room_id'=>5,
            'name'=>'ห้องประชุม',
            'size'=>'ใหญ่มาก',
            'priority'=>1
        ]);
    }
}
