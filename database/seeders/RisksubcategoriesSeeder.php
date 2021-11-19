<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RisksubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risksubcategories')->insert([
            ["id" => "RS001", "slug" => "1", "name_en" => "Safe Surgery and Invasive Procedure", "name_th" => null, "risktype_id" => "RT001", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS002", "slug" => "2", "name_en" => "Safe Anesthesia", "name_th" => null, "risktype_id" => "RT001", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS003", "slug" => "3", "name_en" => "Safe Operating Room", "name_th" => null, "risktype_id" => "RT001", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS004", "slug" => "1", "name_en" => "Hand Hygiene", "name_th" => null, "risktype_id" => "RT002", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS005", "slug" => "2", "name_en" => "Prevention of Healthcare Associated Infection", "name_th" => null, "risktype_id" => "RT002", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS006", "slug" => "3", "name_en" => "Isolation Precaution", "name_th" => null, "risktype_id" => "RT002", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS007", "slug" => "4", "name_en" => "Prevention and Control Spread of Multidrug Resistant Organism", "name_th" => null, "risktype_id" => "RT002", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS008", "slug" => "1", "name_en" => "Safe frome Adverse Drug Events", "name_th" => null, "risktype_id" => "RT003", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS009", "slug" => "2", "name_en" => "Safe from Medication error", "name_th" => null, "risktype_id" => "RT003", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS010", "slug" => "3", "name_en" => "Medication reconciliation", "name_th" => null, "risktype_id" => "RT003", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS011", "slug" => "4", "name_en" => "Rational Drue Use (RDU)", "name_th" => null, "risktype_id" => "RT003", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS012", "slug" => "5", "name_en" => "Blood transfusion Safety", "name_th" => null, "risktype_id" => "RT003", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS013", "slug" => "1", "name_en" => "Patient Identification", "name_th" => null, "risktype_id" => "RT004", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS014", "slug" => "2", "name_en" => "Communication", "name_th" => null, "risktype_id" => "RT004", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS015", "slug" => "3", "name_en" => "Reduction Diagnostic Errors", "name_th" => null, "risktype_id" => "RT004", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS016", "slug" => "4", "name_en" => "Prevention of Common Complication", "name_th" => null, "risktype_id" => "RT004", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS017", "slug" => "5", "name_en" => "Pain Management", "name_th" => null, "risktype_id" => "RT004", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS018", "slug" => "6", "name_en" => "Refer and Transfer Safety", "name_th" => null, "risktype_id" => "RT004", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS019", "slug" => "1", "name_en" => "Catheter and Tubing Connection,and Infusion Pump", "name_th" => null, "risktype_id" => "RT005", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS020", "slug" => "2", "name_en" => "Right and Appropriated Laboratory Result", "name_th" => null, "risktype_id" => "RT005", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS021", "slug" => "1", "name_en" => "Response to the Deteriorating Patient", "name_th" => null, "risktype_id" => "RT006", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS022", "slug" => "2", "name_en" => "Medical Emergency", "name_th" => null, "risktype_id" => "RT006", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS023", "slug" => "3", "name_en" => "Maternal & Neonatal Morbidity", "name_th" => null, "risktype_id" => "RT006", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS024", "slug" => "4", "name_en" => "ER Safety", "name_th" => null, "risktype_id" => "RT006", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS025", "slug" => "1", "name_en" => "Other อื่นๆ ที่ไม่ใช่ SIMPLE", "name_th" => null, "risktype_id" => "RT007", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS026", "slug" => "1", "name_en" => "Maternal Health Care Process", "name_th" => null, "risktype_id" => "RT008", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS027", "slug" => "2", "name_en" => "Child Health Care Process", "name_th" => null, "risktype_id" => "RT008", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS028", "slug" => "3", "name_en" => "Gynecology diseases and procedure", "name_th" => null, "risktype_id" => "RT008", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS029", "slug" => "1", "name_en" => "Specific complications in Surgery", "name_th" => null, "risktype_id" => "RT009", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS030", "slug" => "2", "name_en" => "Urological Surgert", "name_th" => null, "risktype_id" => "RT009", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS031", "slug" => "1", "name_en" => "Respiratory System", "name_th" => null, "risktype_id" => "RT010", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS032", "slug" => "2", "name_en" => "Cardiovascular System", "name_th" => null, "risktype_id" => "RT010", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS033", "slug" => "3", "name_en" => "Gastrointestinal System", "name_th" => null, "risktype_id" => "RT010", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS034", "slug" => "4", "name_en" => "Neurological System", "name_th" => null, "risktype_id" => "RT010", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS035", "slug" => "5", "name_en" => "Specific complications of Medical Procedure", "name_th" => null, "risktype_id" => "RT010", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS036", "slug" => "6", "name_en" => "Medical Emergencies Complications", "name_th" => null, "risktype_id" => "RT010", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS037", "slug" => "1", "name_en" => "Pediatric disease", "name_th" => null, "risktype_id" => "RT011", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS038", "slug" => "2", "name_en" => "Pediatric Medical Disease \/ Complication", "name_th" => null, "risktype_id" => "RT011", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS039", "slug" => "1", "name_en" => "Ortho-Surgery Complications", "name_th" => null, "risktype_id" => "RT012", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS040", "slug" => "1", "name_en" => "EYE\/Ophthalmic Disease", "name_th" => null, "risktype_id" => "RT013", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS041", "slug" => "2", "name_en" => "ENT Disease", "name_th" => null, "risktype_id" => "RT013", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS042", "slug" => "1", "name_en" => "Dental Treatment Complications", "name_th" => null, "risktype_id" => "RT014", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS043", "slug" => "1", "name_en" => "Security and Privacy of Informaiton", "name_th" => null, "risktype_id" => "RT015", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS044", "slug" => "2", "name_en" => "Social Media and Communication Professionalism", "name_th" => null, "risktype_id" => "RT015", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS045", "slug" => "1", "name_en" => "Fundamental of Infection Control and Prevention for Workforce", "name_th" => null, "risktype_id" => "RT016", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS046", "slug" => "2", "name_en" => "Specific Infection Control and Prevention for Workforce", "name_th" => null, "risktype_id" => "RT016", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS047", "slug" => "1", "name_en" => "Mental Health", "name_th" => null, "risktype_id" => "RT017", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS048", "slug" => "2", "name_en" => "Mediation", "name_th" => null, "risktype_id" => "RT017", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS049", "slug" => "1", "name_en" => "Fundamental Guideline for Prevention of Work-Related Disorder", "name_th" => null, "risktype_id" => "RT018", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS050", "slug" => "2", "name_en" => "Specific Guideline for Prevention of Work-Related Disorder", "name_th" => null, "risktype_id" => "RT018", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS051", "slug" => "3", "name_en" => "Fitness for Work or Duty Health Assessment", "name_th" => null, "risktype_id" => "RT018", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS052", "slug" => "1", "name_en" => "Ambulance and Referral Safety", "name_th" => null, "risktype_id" => "RT019", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS053", "slug" => "2", "name_en" => "Legal Issues", "name_th" => null, "risktype_id" => "RT019", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS054", "slug" => "1", "name_en" => "Safe Physical Environment", "name_th" => null, "risktype_id" => "RT020", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS055", "slug" => "2", "name_en" => "Working Conditions", "name_th" => null, "risktype_id" => "RT020", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS056", "slug" => "3", "name_en" => "Workplace Violence", "name_th" => null, "risktype_id" => "RT020", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS057", "slug" => "1", "name_en" => "Other อื่นๆ ที่ไม่ใช่ SIMPLE", "name_th" => null, "risktype_id" => "RT021", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS058", "slug" => "1", "name_en" => "Strategy System", "name_th" => null, "risktype_id" => "RT022", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS059", "slug" => "2", "name_en" => "Structure System", "name_th" => null, "risktype_id" => "RT022", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS060", "slug" => "3", "name_en" => "Security System", "name_th" => null, "risktype_id" => "RT022", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS061", "slug" => "1", "name_en" => "Information Technology & Communication", "name_th" => null, "risktype_id" => "RT023", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS062", "slug" => "2", "name_en" => "Internal control & Inventory", "name_th" => null, "risktype_id" => "RT023", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS063", "slug" => "1", "name_en" => "Manpower", "name_th" => null, "risktype_id" => "RT024", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS064", "slug" => "2", "name_en" => "Management", "name_th" => null, "risktype_id" => "RT024", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS065", "slug" => "1", "name_en" => "Policy", "name_th" => null, "risktype_id" => "RT025", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS066", "slug" => "2", "name_en" => "Process of work & Operation", "name_th" => null, "risktype_id" => "RT025", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS067", "slug" => "1", "name_en" => "Professional & Operational Supervision", "name_th" => null, "risktype_id" => "RT026", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS068", "slug" => "1", "name_en" => "Financial", "name_th" => null, "risktype_id" => "RT027", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')],
            ["id" => "RS069", "slug" => "2", "name_en" => "Budget", "name_th" => null, "risktype_id" => "RT027", "created_at" => Carbon::now()->format('Y-m-d H:i:s'), "updated_at" => Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}
