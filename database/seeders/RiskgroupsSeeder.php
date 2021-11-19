<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiskgroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('riskgroups')->insert([
            [
                'id' => 'RG001',
                'slug' => 'C',
                'name_en' => 'Clinical Risk Incident',
                'name_th' => 'ความเสี่ยงทางคลินิก',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RG002',
                'slug' => 'G',
                'name_en' => 'General Risk Incident',
                'name_th' => 'ความเสี่ยงทั่วไป',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
