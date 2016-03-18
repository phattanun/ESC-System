<?php

use Illuminate\Database\Seeder;
use \App\UserReservation;
class UserReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserReservation::create([
            'reason'=>'ประชุมวิชา SA & DB',
            'number_of_people'=>40,
            'request_start_time'=>date("Y-m-d")." 13:00:00",
            'request_end_time'=>date("Y-m-d")." 15:45:00",
            'request_projector'=>true,
            'request_plug'=>40,
            'allow_plug'=>0,
            'student_id'=>2,
            'div_id'=>100001,
            'other_div'=>'ปี 3 เท่านั้น',
            'request_room_id'=>1,
            'create_at'=>date("Y-m-d")." 12:35:01"
        ]);
        UserReservation::create([
            'reason'=>'ประชุมวิชา BI',
            'number_of_people'=>40,
            'request_start_time'=>date("Y-m-d")." 9:00:00",
            'request_end_time'=>date("Y-m-d")." 12:00:00",
            'request_projector'=>true,
            'request_plug'=>40,
            'allow_plug'=>0,
            'student_id'=>2,
            'div_id'=>100001,
            'other_div'=>'ปี 3 เท่านั้น',
            'request_room_id'=>3,
            'create_at'=>date("Y-m-d")." 12:35:02"
        ]);
        UserReservation::create([
            'reason'=>'ประชุมวิชา Network',
            'number_of_people'=>40,
            'request_start_time'=>date("Y-m-d")." 13:00:00",
            'request_end_time'=>date("Y-m-d")." 16:00:00",
            'request_projector'=>true,
            'request_plug'=>40,
            'allow_plug'=>0,
            'student_id'=>2,
            'div_id'=>100001,
            'other_div'=>'ปี 3 เท่านั้น',
            'request_room_id'=>1,
            'create_at'=>date("Y-m-d")." 12:35:03"
        ]);
        UserReservation::create([
            'reason'=>'ประชุมวิชา DIS SYS',
            'number_of_people'=>40,
            'request_start_time'=>date("Y-m-d")." 8:00:00",
            'request_end_time'=>date("Y-m-d")." 10:30:00",
            'request_projector'=>true,
            'request_plug'=>40,
            'allow_plug'=>0,
            'student_id'=>2,
            'div_id'=>100001,
            'other_div'=>'ปี 3 เท่านั้น',
            'request_room_id'=>2,
            'create_at'=>date("Y-m-d")." 12:35:04"
        ]);
    }
}
