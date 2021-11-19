<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiskcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('riskcategories')->insert([
            [
                'id' => 'RC001',
                'slug' => 'P',
                'name_en' => 'Patient Safety Goals หรือ Commom Clinical Risk Incident',
                'riskgroup_id' => 'RG001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RC002',
                'slug' => 'S',
                'name_en' => 'Specific Clinical Risk Incident',
                'riskgroup_id' => 'RG001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RC003',
                'slug' => 'P',
                'name_en' => 'Personel Safety Goals',
                'riskgroup_id' => 'RG002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RC004',
                'slug' => 'O',
                'name_en' => 'Organization Safety Goals',
                'riskgroup_id' => 'RG002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
