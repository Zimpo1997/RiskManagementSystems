<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name_en' => 'Admin',
                'name_th' => 'ผู้ดูแลระบบ',
                'slug' => 'admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'User',
                'name_th' => 'ผู้ใช้งานทั่วไป',
                'slug' => 'user',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'RM Admin',
                'name_th' => 'ทีมแอดมินบริหารความเสี่ยง',
                'slug' => 'rm_admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'RM Program',
                'name_th' => 'ทีมบริหารความเสี่ยงโปรแกรม',
                'slug' => 'rm_program',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'RM Boss',
                'name_th' => 'ผู้บริหาร',
                'slug' => 'rm_boss',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Agency',
                'name_th' => 'หัวหน้ากลุ่มงานแก้ไข',
                'slug' => 'agency',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
