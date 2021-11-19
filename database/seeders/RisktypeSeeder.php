<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RisktypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risktypes')->insert([
            [
                'id' => 'RT001',
                'slug' => 'S',
                'name_en' => 'Safe Surgery',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT002',
                'slug' => 'I',
                'name_en' => 'Infection Prevention and Control',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT003',
                'slug' => 'M',
                'name_en' => 'Medication & Blood Safety',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT004',
                'slug' => 'P',
                'name_en' => 'Patient Care Processes',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT005',
                'slug' => 'L',
                'name_en' => 'Line, Tube, and Catheter & Laboratory',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT006',
                'slug' => 'E',
                'name_en' => 'Emergency Response',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT007',
                'slug' => 'O',
                'name_en' => 'Other',
                'riskcategories_id' => 'RC001',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT008',
                'slug' => 'G',
                'name_en' => 'Gynecology & Obsterics diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT009',
                'slug' => 'S',
                'name_en' => 'Surgical diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT010',
                'slug' => 'M',
                'name_en' => 'Medical diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT011',
                'slug' => 'P',
                'name_en' => 'Pedriatic diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT012',
                'slug' => 'O',
                'name_en' => 'Orthopedic diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT013',
                'slug' => 'E',
                'name_en' => 'Eye,Ear,Nose,Throat diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT014',
                'slug' => 'D',
                'name_en' => 'Dental diseases and procedure',
                'riskcategories_id' => 'RC002',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT015',
                'slug' => 'S',
                'name_en' => 'Security Privacy of Information and Social Media ',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT016',
                'slug' => 'I',
                'name_en' => 'Infection and Exposure',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT017',
                'slug' => 'M',
                'name_en' => 'Mental Health and Mediation',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT018',
                'slug' => 'P',
                'name_en' => 'Process of work',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT019',
                'slug' => 'L',
                'name_en' => 'Lane (Ambulance) and Legal Issues',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT020',
                'slug' => 'E',
                'name_en' => 'Environment & Working Conditions',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT021',
                'slug' => 'O',
                'name_en' => 'Other',
                'riskcategories_id' => 'RC003',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT022',
                'slug' => 'S',
                'name_en' => 'Strategy,Structure,Security',
                'riskcategories_id' => 'RC004',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT023',
                'slug' => 'I',
                'name_en' => 'Information Technology & Communication, Internal control & Inventory',
                'riskcategories_id' => 'RC004',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT024',
                'slug' => 'M',
                'name_en' => 'Manpower, Management',
                'riskcategories_id' => 'RC004',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT025',
                'slug' => 'P',
                'name_en' => 'Policy, Process of work & Operation',
                'riskcategories_id' => 'RC004',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT026',
                'slug' => 'L',
                'name_en' => 'Licensed &Professional certification',
                'riskcategories_id' => 'RC004',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 'RT027',
                'slug' => 'E',
                'name_en' => 'Economy',
                'riskcategories_id' => 'RC004',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
