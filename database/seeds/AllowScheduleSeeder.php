<?php

use Illuminate\Database\Seeder;
use App\AllowSchedule;

class AllowScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AllowSchedule::create([
            'id'=> '1',
            'start_date'=> '2016-03-08',
            'end_date'=> '2016-03-13',
            'start_time'=> '08:00',
            'end_time'=> '16:00',
            'room_closed'=> '0'
        ]);

        AllowSchedule::create([
            'id'=> '2',
            'start_date'=> '2016-03-015',
            'end_date'=> '2016-03-27',
            'start_time'=> '10:00',
            'end_time'=> '12:00',
            'room_closed'=> '1'
        ]);


    }
}
