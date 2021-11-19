<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            [
                'rp_name' => 'ความเสี่ยงทั่วไปทางคลินิก',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงทางคลินิกเฉพาะโรค',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านระบบยา',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงเรื่องการแพร่กระจายเชื้อในโรงพยาบาล',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านข้อมูลข่าวสาร / สารสนเทศ',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านบุคลากร',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านสิ่งแวดล้อม / โครงสร้างกายภาพ / ความปลอดภัย',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านระบบเครื่องมือ / อุปกรณ์',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านทรัพย์สิน / ทรัพยากร',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านสิทธิ์ผู้ป่วย / ข้อร้องเรียน / กฎหมาย',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'rp_name' => 'ความเสี่ยงด้านการบริหารทั่วไป',
                'rp_token_line' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
