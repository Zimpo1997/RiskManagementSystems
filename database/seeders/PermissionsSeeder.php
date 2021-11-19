<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name_en' => 'View Users',
                'name_th' => 'ดูรายละเอียดผู้ใช้งาน',
                'slug' => 'show-users',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Create Users',
                'name_th' => 'สร้างผู้ใช้งาน',
                'slug' => 'create-users',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Edit Users',
                'name_th' => 'แก้ไขผู้ใช้งาน',
                'slug' => 'edit-users',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Delete Users',
                'name_th' => 'ลบผู้ใช้งาน',
                'slug' => 'delete-users',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'name_en' => 'Show Risk',
                'name_th' => 'ดูรายละเอียดความเสี่ยง',
                'slug' => 'show-risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Edit Risk',
                'name_th' => 'แก้ไขความเสี่ยง',
                'slug' => 'edit-risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Delete Risk',
                'name_th' => 'ลบผู้ใช้งาน',
                'slug' => 'delete-risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Rm Admin Send Risk',
                'name_th' => 'ส่งต่อความเสี่ยงให้กับโปรแกรม',
                'slug' => 'rm_admin_send_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Rm Program Send Risk To Agency',
                'name_th' => 'ส่งต่อความเสี่ยงให้กับหน่วยงาน',
                'slug' => 'rm_program_send_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Rm Program Back Risk',
                'name_th' => 'ส่งกลับความเสี่ยงให้กับแอดมิน',
                'slug' => 'rm_program_back_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Boss Send Risk',
                'name_th' => 'อนุมัติความเสี่ยงให้กับหน่วยงานแก้ไข',
                'slug' => 'boss_send_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Boss Back Risk',
                'name_th' => 'ไม่อนุมัติความเสี่ยงให้กับหน่วยงาน',
                'slug' => 'boss_back_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Agency Back Risk',
                'name_th' => 'ส่งกลับความเสี่ยงให้กับโปรแกรม',
                'slug' => 'agency_back_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name_en' => 'Agency Edit Risk',
                'name_th' => 'แก้ไขความเสี่ยงของหน่วยงาน',
                'slug' => 'agency_edit_risk',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
