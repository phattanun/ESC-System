<?php

use Illuminate\Database\Seeder;
use \App\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contact::create([
        //     'student_id' => 5631009821,
        //     'position' => 'Project Manager'
        // ]);
        //
        // Contact::create([
        //     'student_id' => 5631008121,
        //     'position' => 'Business Analyst'
        // ]);
        //
        // Contact::create([
        //     'student_id' => 5631002321,
        //     'position' => 'System Analyst'
        // ]);
        //
        // Contact::create([
        //     'student_id' => 5631076821,
        //     'position' => 'Technical Lead'
        // ]);

        Contact::create([
            'student_id' => 1,
            'position' => 'Programmer'
        ]);

        // Contact::create([
        //     'student_id' => 5631011021,
        //     'position' => 'Graphic Designer'
        // ]);
    }
}
