<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
            [
                'name' => 'งานการเงินและการบัญชี',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานพัสดุก่อสร้างการซ่อมบำรุง',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานธุรการการบริหารยานพาหนะ',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานรักษาความปลอดภัย',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานประชาสัมพันธ์',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานซักฟอก',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานอาคารสถานที่',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการเจ้าหน้าที',
                'workgroup_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานวิเคราะห์สิ่งตัวอย่างทาง ห้องปฏิบัติการเทคนิคการแพทย์',
                'workgroup_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานธนาคารเลือดและบริการ ส่วนประกอบของเลือด',
                'workgroup_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานตรวจ วินิจฉัย บำบัดรักษา ฟื้นฟู สภาพส่งเสริมและป้องกันทางทันตกรรม',
                'workgroup_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานบริการเภสัชกรรมผู้ป่วยนอก',
                'workgroup_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานบริการเภสัชกรรมผู้ป่วยใน',
                'workgroup_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานบริหารเวชภัณฑ์',
                'workgroup_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานคุ้มครองผู้บริโภค',
                'workgroup_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานให้คำปรึกษาด้านเภสัชกรรม',
                'workgroup_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานตรวจวินิจฉัย บำบัดรักษาผู้ป่วย ทั้งผู้ป่วยนอก ผู้ป่วยอุบัติเหตุฉุกเฉิน ผู้ป่วยในผู้ป่วยผ่าตัด ผู้มาคลอด',
                'workgroup_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานบริหารจัดการอาหารตามมาตรฐานโภชนาการ',
                'workgroup_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานโภชนบำบัด ให้คำปรึกษา คำแนะนำ ความรู้ด้านโภชนาการและโภชนบำบัด',
                'workgroup_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานตรวจ วินิจฉัยและรักษาโดยรังสีเอกซเรย์',
                'workgroup_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานตรวจประเมิน การวินิจฉัย และบำบัดความบกพร่องของร่างกายด้วยวิธีทางการภาพบำบัด',
                'workgroup_id' => 8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานฟื้นฟูความเสื่อมสภาพ ความพิการ',
                'workgroup_id' => 8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานประกันสุขภาพการขึ้นทะเบียน การตรวจสอบสิทธิ การเรียกเก็บ การตามจ่าย',
                'workgroup_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานเวชสถิติและงานข้อมูล การจัดการเวชระเบียน การลงรหัสโรค',
                'workgroup_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานเทคโนโลยีสารสนเทศและคอมพิวเตอร์',
                'workgroup_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานแผนงานและยุทธศาสตร์เครือข่ายสุขภาพ',
                'workgroup_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานสังคมสงเคราะห์ การให้บริการสังคมสงเคราะห์ทางการแพทย์ ผู้ปุวยนอก ผู้ปุวยใน ครอบครัวและชุมชน การบริการคลินิกศูนย์พึ่งได้',
                'workgroup_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานเวชปฏิบัติครอบครัวและชุมชน',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลในชุมชน',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานส่งเสริมสุขภาพทุกกลุ่มวัย',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานป้องกันและควบคุมโรคและระบาดวิทยา',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานอาชีวอนามัย',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานสุขาภิบาลสิ่งแวดล้อมและศูนย์ความปลอดภัย',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานพัฒนาระบบบริการปฐมภูมิและสนับสนุนเครือข่าย',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานสุขภาพจิตและจิตเวช',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานอนามัยโรงเรียน',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานสุขภาพภาคประชาชน',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานบำบัดยาเสพติดสุรา บุหรี่',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานสุขศึกษาและพัฒนาพฤติกรรมสุขภาพ',
                'workgroup_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลผู้ป่วยนอก',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลผู้ป่วยอุบัติเหตุฉุกเฉินและนิติเวช',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลผู้ป่วยใน',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลผู้ป่วยหนัก',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลผู้ปุวยผ่าตัดและวิสัญญีพยาบาล',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานพยาบาลหน่วยควบคุมการติดเชื้อและงานจ่ายกลาง',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการพยาบาลผู้คลอด',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานวิจัยและพัฒนา',
                'workgroup_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'งานการแพทย์แผนไทยและการแพทย์ทางเลือก',
                'workgroup_id' => 12,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
