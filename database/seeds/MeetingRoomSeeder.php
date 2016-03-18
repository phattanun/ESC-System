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
    }
}
