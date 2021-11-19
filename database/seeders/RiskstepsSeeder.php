<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiskstepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risksteps')->insert([
            [
                'id' => '1',
                'name' => "รอ RM ตรวจสอบ",
                'color' => "#00ACC1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'name' => "รอส่งหน่วยงาน",
                'color' => "#8076de",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '3',
                'name' => "รอ ผอ. อนุมัติ",
                'color' => "#FB8C00",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '4',
                'name' => "หน่วยงานดำเนินการ",
                'color' => "#F4511E",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '5',
                'name' => "รอ ผอ. ยืนยัน",
                'color' => "#1E88E5",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '6',
                'name' => "รอ RM จำหน่าย",
                'color' => "#AED581",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '7',
                'name' => "ทบทวน",
                'color' => "#43A047",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '99',
                'name' => "ส่งคืนความเสี่ยงให้แอดมินความเสี่ยง",
                'color' => "#7E57C2",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '98',
                'name' => "ส่งคืนความเสี่ยงให้ความเสี่ยงโปรแกรม",
                'color' => "#7E57C2",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
