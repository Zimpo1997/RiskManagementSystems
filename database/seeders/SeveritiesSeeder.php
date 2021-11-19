<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeveritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('riskseverities')->insert([
            [
                'name' => 'A',
                'slug' => '(เกิดที่นี่) เกิดเหตุการณ์ขึ้นแล้วจากตัวเองและค้นพบได้ด้วยตัวเองสามารถปรับแก้ไขได้ไม่ส่งผลกระทบถึงผู้อื่นและผู้ป่วยหรือบุคลากร',
                'color' => '#66BB6A',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'B',
                'slug' => '(เกิดที่ไกล) เกิดเหตุการณ์ / ความผิดพลาดขึ้นแล้วโดยส่งต่อเหตุการณ์ / ความผิดพลาดนั้นไปที่ผู้อื่นแต่สามารถตรวจพบและแก้ไขได้ โดยยังไม่มีผลกระทบใดๆ ถึงผู้ป่วยหรือบุคลากร',
                'color' => '#43A047',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'C',
                'slug' => '(เกิดกับใคร) เกิดเหตุการณ์ / ความผิดพลาดขึ้นและมีผลกระทบถึงผู้ป่วยหรือบุคลากร แต่ไม่เกิดอันตรายหรือเสียหาย',
                'color' => '#2E7D32',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'D',
                'slug' => '(ให้ระวัง) เกิดความผิดพลาดขึ้น มีผลกระทบถึงผู้ป่วยหรือบุคลากร ต้องให้การดูและเฝ้าระวังเป็นพิเศษว่าจะไม่เป็นอันตราย',
                'color' => '#FFCA28',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'E',
                'slug' => '(ต้องรักษา) เกิดความผิดพลาดขึ้น มีผลกระทบถึงผู้ป่วยหรือบุคคลากร เกิดอันตรายชั่วคราวที่ต้องแก้ไข / รักษาเพิ่มมากขึ้น',
                'color' => '#FFB300',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'F',
                'slug' => '(เยียวยานาน) เกิดความผิดพลาดขึ้น มีผลกระทบที่ต้องใช้เวลาแก้ไขนานกว่าปกติหรือเกินกำหนด ผู้ป่วยหรือบุคลากร ต้องรักษา / นอนโรงพยาบาลนานขึ้น',
                'color' => '#FF8F00',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'G',
                'slug' => '(ต้องพิการ) เกิดความผิดพลาดถึงผู้ป่วยหรือบุคลากร ทำให้เกิดความพิการถาวร หรือมีผลกระทบทำให้เสียชื่อเสียง / ความเชื่อถือและ / หรือมีการเรียกร้อง',
                'color' => '#F57C00',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'H',
                'slug' => '(ต้องการปั๊ม) เกิดความผิดพลาดถึงผู้ป่วยหรือบุคลากร มีผลทำให้ต้องทำการช่วยชีวิต หรือกรณีทำให้เสียชื่อเสียงและ / หรือมีการเรียกร้องค่าเสียหายจากโรงพยาบาล',
                'color' => '#FF7043',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'I',
                'slug' => '(จำใจลา) เกิดความผิดพลาดถึงผู้ป่วยหรือบุคลากร เป็นสาเหตุทำให้เสียชีวิต เสียชื่อเสียงโดยมีการฟ้องร้องทางศาล / สื่อ',
                'color' => '#F4511E',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => '1',
                'slug' => 'เกิดความผิดพลาดขึ้นแต่ไม่มีผลกระทบต่อผลสำเร็จหรือวัตถุประสงค์ของการดำเนินงาน (* เกิดผลกระทบที่มีมูลค่าความเสียหาย 0 - 10,000 บาท)',
                'color' => '#00E676',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => '2',
                'slug' => 'เกิดความผิดพลาดขึ้นแล้ว โดยมีผลกระทบ (ที่ควบคุมได้) ต่อผลสำเร็จหรือวัตถุประสงค์ของการดำเนินงาน (* เกิดผลกระทบที่มีมูลค่าความเสียหาย 10,001 - 50,000 บาท)',
                'color' => '#00C853',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => '3',
                'slug' => 'เกิดความผิดพลาดขึ้นแล้ว และมีผลกระทบ (ที่ต้องทำการแก้ไข) ต่อผลสำเร็จหรือวัตถุประสงค์ของการดำเนินงาน (* เกิดผลกระทบที่มีมูลค่าความเสียหาย 50,001 - 250,000 บาท)',
                'color' => '#F57F17',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => '4',
                'slug' => 'เกิดความผิดพลาดขึ้นแล้ว และทำให้การดำเนินงานไม่บรรลุผลสำเร็จตามเป้าหมาย (* เกิดผลกระทบที่มีมูลค่าความเสียหาย 250,001 - 10,000,000 บาท)',
                'color' => '#FF7043',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => '5',
                'slug' => 'เกิดความผิดพลาดขึ้นแล้ว และทำให้การดำเนินงานไม่บรรลุผลสำเร็จตามเป้าหมาย ทำให้ภารกิจขององค์การเสียหายอย่างร้ายแรง (* เกิดผลกระทบที่มีมูลค่าความเสียหายมากกว่า 10 ล้านบาท)',
                'color' => '#F4511E',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
