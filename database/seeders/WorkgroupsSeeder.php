<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkgroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workgroups')->insert([
            [
                'name' => 'กลุ่มบริหารงานทั่วไป',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานเทคนิคการแพทย์',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานทันตกรรม',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานเภสัชกรรมและคุ้มครองผู้บริโภค',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานการแพทย์',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานโภชนศาสตร์',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานรังสีวิทยา',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานเวชกรรมฟื้นฟู',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานประกันสุขภาพ ยุทธศาสตร์ และสารสนเทศทางการแพทย์',
                'tokenline' => "oDwH7E05OtQHKYsQXTTVhiU08i6iLBq0uvtHcyMSGVQ",
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานปฐมภูมิและองค์รวม',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานการพยาบาล',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'กลุ่มงานการแพทย์แผนไทยและการแพทย์ทางเลือก',
                'tokenline' => null,
                // 'member_id' => 1,
                'mission_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
