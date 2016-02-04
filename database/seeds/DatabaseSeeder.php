<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\Permission;

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
         $this->call(PermissionTableSeeder::class);

        Model::reguard();
    }
}
class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['student_id'=>'1',
            'password'=>bcrypt('1'),
            'name'=>'ปฏิพล',
            'surname'=>'เจียมมั่นจิต',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29 00:00:00',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>'คอมฯ ณ ห้องเขียว',
            'group'=>'F',
            'allergy'=>'ถั่ว',
            'anomaly'=>'อะไรวะ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
    }
}

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['student_id'=>'1','permission'=>'room']);
        Permission::create(['student_id'=>'1','permission'=>'news']);
    }
}
