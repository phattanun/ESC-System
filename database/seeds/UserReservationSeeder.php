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
            'request_start_time'=>"2016-03-07 13:00:00",
            'request_end_time'=>"2016-03-07 15:45:00",
            'request_projector'=>true,
            'request_plug'=>40,
            'allow_plug'=>0,
            'student_id'=>2,
            'div_id'=>100001,
            'other_div'=>'ปี 3 เท่านั้น',
            'request_room_id'=>1,
            'create_at'=>"2015-03-06 12:35:42"
        ]);
    }
}
