<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\Permission;
use \App\Setting;

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

        $this->call(DivisionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(news_seeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(MeetingRoomSeeder::class);
        $this->call(UserReservationSeeder::class);
        $this->call(GuestReservationSeeder::class);
        $this->call(ScheduleSettingSeeder::class);
        $this->call(AllowScheduleSeeder::class);
        $this->call(CanEditActivitySeeder::class);
        $this->call(ContactTableSeeder::class);

        Model::reguard();
    }
}
class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['student_id'=>2,
            'password'=>bcrypt('2'),
            'name'=>'น่าสงสาร',
            'surname'=>'ไม่มี Permission เลย',
            'nickname'=>'แย่จัง',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100001,
            'group'=>1002,
            'generation'=>96,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
        User::create(['student_id'=>1,
            'password'=>bcrypt('1'),
            'name'=>'ปฏิพล',
            'surname'=>'เจียมมั่นจิต',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100002,
            'group'=>1003,
            'generation'=>98,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
        User::create(['student_id'=>5631011021,
            'password'=>bcrypt('3'),
            'name'=>'พัทธนันท์',
            'surname'=>'อัครพันธุ์ธัช',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100003,
            'group'=>1004,
            'generation'=>97,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
        User::create(['student_id'=>5631008121,
            'password'=>bcrypt('4'),
            'name'=>'กิตติภณ',
            'surname'=>'พละการ',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100004,
            'group'=>1005,
            'generation'=>99,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
        User::create(['student_id'=>5631009821,
            'password'=>bcrypt('5'),
            'name'=>'กิตติภพ',
            'surname'=>'พละการ',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100005,
            'group'=>1005,
            'generation'=>96,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
        User::create(['student_id'=>5631002321,
            'password'=>bcrypt('6'),
            'name'=>'กฤตย์',
            'surname'=>'กังวาลพงศ์พันธุ์',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100006,
            'group'=>1006,
            'generation'=>97,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
        User::create(['student_id'=>5631076821,
            'password'=>bcrypt('6'),
            'name'=>'มงกุฎ',
            'surname'=>'คลังพรคุณ',
            'nickname'=>'คุณแอดมิน',
            'address'=>'29/50 หมู่บ้านอลิชา 1 พุทธบูชา 36 บางมด ทุ่งครุ กรุงเทพฯ 10140',
            'birthdate'=>'1994-11-29',
            'phone_number'=>'0924587067',
            'email'=>'fongac127@gmail.com',
            'facebook_link'=>'www.facebook.com/fonggag/',
            'line_id'=>'fong127',
            'emergency_contact'=>'0924587067',
            'department'=>100006,
            'group'=>1006,
            'generation'=>97,
            'allergy'=>'ถั่ว',
            'anomaly'=>'โรคหัวใจ',
            'religion'=>'พุทธ',
            'blood_type'=>'A',
            'clothing_size'=>'L']);
    }
}

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['student_id'=>1,'news'=>true,'room'=>true,'supplies'=>true,'activities'=>true,'student'=>true]);
        Permission::create(['student_id'=>2,'news'=>false,'room'=>false,'supplies'=>false,'activities'=>false,'student'=>false]);
    }
}
class SettingTableSeeder extends Seeder
{
    public function run()
    {
        Setting::create(['admin_id'=>1,'year'=>2558]);
    }
}
