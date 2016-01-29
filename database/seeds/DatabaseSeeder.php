<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
         $this->call(news_seeder::class);

        Model::reguard();
    }
}
class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['student_id'=>'5631057921',
            'password'=>bcrypt('111111'),
            'name'=>'ปฏิพล',
            'surname'=>'เจียมมั่นจิต',
            'nickname'=>'ฮยอนฟง',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29 00:00:00',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department_id'=>'3',
            'group'=>'F',
            'allergy'=>'ถั่ว',
            'anomaly'=>'อะไรวะ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
    }
}
