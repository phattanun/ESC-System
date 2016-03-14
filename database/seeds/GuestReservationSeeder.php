<?php

use Illuminate\Database\Seeder;
use \App\GuestReservation;
class GuestReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuestReservation::create([
            'reason'=>'ประชุมวิชา Indiv - Data mining',
            'number_of_people'=>7,
            'request_start_time'=>"2015-03-07 8:00:00",
            'request_end_time'=>"2015-03-07 13:15:00",
            'request_projector'=>true,
            'request_plug'=>2,
            'allow_plug'=>0,
            'guest_name'=>'มงกุฎ',
            'guest_surname'=>'คลังพรคุณ',
            'guest_phone_number'=>'0899999999',
            'guest_student_id'=>'5631076821',
            'guest_faculty'=>'วิศวกรรมขุดข้อมูล',
            'guest_email'=>'project@sa.db',
            'guest_org'=>'ชมรมนักขุด',
            'request_room_id'=>1,
            'create_at'=>"2015-03-05 09:35:42"
        ]);
    }
}
