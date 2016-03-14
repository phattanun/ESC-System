<?php

use Illuminate\Database\Seeder;
use \App\Activity;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name'=> 'ค่ายลานเกียร์ ครั้งที่ 15',
            'year'=> 2558,
            'category' => 'academic',
            'tqf_ethics' => false,
            'tqf_knowledge' => true,
            'tqf_cognitive' => true,
            'tqf_interpersonal' => true,
            'tqf_communication' => true,
            'status' => 0,
            'avail_year' => 1,
            'div_id' => 97,
            'creator_id' => 1,
            'editor_id' => 1
        ]);

        Activity::create([
            'name'=> 'ค่ายอาสาพัฒนา ยุววิศวกรบพิธ 44',
            'year'=> 2558,
            'category' => 'volunteer',
            'tqf_ethics' => false,
            'tqf_knowledge' => true,
            'tqf_cognitive' => false,
            'tqf_interpersonal' => true,
            'tqf_communication' => false,
            'status' => 0,
            'avail_year' => 1,
            'div_id' => 97,
            'creator_id' => 1,
            'editor_id' => 1
        ]);

        Activity::create([
            'name'=> 'ละครเงา',
            'year'=> 2558,
            'category' => 'culture',
            'tqf_ethics' => false,
            'tqf_knowledge' => false,
            'tqf_cognitive' => false,
            'tqf_interpersonal' => false,
            'tqf_communication' => false,
            'status' => 0,
            'avail_year' => 1,
            'div_id' => 97,
            'creator_id' => 2,
            'editor_id' => 1
        ]);

        Activity::create([
            'name'=> 'ค่ายวิษณุกรรมบุตร ครั้งที่ 13',
            'year'=> 2558,
            'category' => 'culture',
            'tqf_ethics' => false,
            'tqf_knowledge' => false,
            'tqf_cognitive' => false,
            'tqf_interpersonal' => true,
            'tqf_communication' => false,
            'status' => 0,
            'avail_year' => 1,
            'div_id' => 97,
            'creator_id' => 2,
            'editor_id' => 1
        ]);
    }
}
