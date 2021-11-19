<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'user_id' => 1,
                'title' => "นาย",
                'fname' => "ศุภราช",
                'lname' => "วรรณทิพภากรณ์",
                'card_number' => "1669800230745",
                'birthday' => "1997-09-04",
                'sex' => "ชาย",
                'tel' => "0612682382",

                'agencies_id' => 25,
                'position' => "นักวิชาการคอมพิวเตอร์",
                'degree' => "ปฏิบัติการ",
                'member_id' => 1,

                'add_home' => "5/1",
                'add_moo' => "11",
                'add_district' => "บางไผ่",
                'add_amphure' => "บางมูลนาก",
                'add_province' => "พิจิตร",

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
