<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
            RiskEpointSeeder::class,
            RiskstepsSeeder::class,
            SeveritiesSeeder::class,
            TeamriskSeeder::class,
            ProgramSeeder::class,
            MissionsSeeder::class,
            WorkgroupsSeeder::class,
            AgencySeeder::class,
            MembersSeeder::class,
            RiskgroupsSeeder::class,
            RiskcategoriesSeeder::class,
            RisktypeSeeder::class,
            RisksubcategoriesSeeder::class,
            RisksubjectSeeder::class,
        ]);

        DB::table('roles_permissions')->insert([
            [
                'role_id' => 1,
                'permission_id' => 1
            ],
            [
                'role_id' => 1,
                'permission_id' => 2
            ],
            [
                'role_id' => 1,
                'permission_id' => 3
            ],
            [
                'role_id' => 1,
                'permission_id' => 4
            ],
            [
                'role_id' => 3,
                'permission_id' => 5
            ],
            [
                'role_id' => 3,
                'permission_id' => 6
            ],
            [
                'role_id' => 3,
                'permission_id' => 7
            ],
            [
                'role_id' => 3,
                'permission_id' => 8
            ],
            [
                'role_id' => 4,
                'permission_id' => 9
            ],
            [
                'role_id' => 4,
                'permission_id' => 10
            ],
            [
                'role_id' => 5,
                'permission_id' => 11
            ],
            [
                'role_id' => 5,
                'permission_id' => 12
            ],
            [
                'role_id' => 6,
                'permission_id' => 13
            ],
            [
                'role_id' => 6,
                'permission_id' => 14
            ],
        ]);

        DB::table('users_roles')->insert([
            [
                'user_id' => 1,
                'role_id' => 1
            ],
            [
                'user_id' => 1,
                'role_id' => 3
            ],
            [
                'user_id' => 1,
                'role_id' => 4
            ],
            [
                'user_id' => 1,
                'role_id' => 5
            ],
            [
                'user_id' => 1,
                'role_id' => 6
            ],
        ]);

        DB::table('users_programs')->insert([
            [
                'user_id' => 1,
                'program_id' => 1
            ],
            [
                'user_id' => 1,
                'program_id' => 2
            ],
        ]);

        DB::table('users_teamrisks')->insert([
            [
                'user_id' => 1,
                'teamrisk_id' => 1
            ],
            [
                'user_id' => 1,
                'teamrisk_id' => 2
            ],
        ]);
    }
}
