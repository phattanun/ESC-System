<?php

use Illuminate\Database\Seeder;
use App\ScheduleSetting;

class ScheduleSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduleSetting::create([
            'start'=> '08:00',
            'end'=> '18:00'
        ]);
    }
}
