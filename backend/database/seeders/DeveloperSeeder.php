<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Developer::factory(5)->create();

        \DB::table('developers')->delete();

        \DB::table('developers')->insert([
            [
                'first_name' => 'Rhiannon',
                'last_name' => 'Weimann',
                'email' => 'hallie.smith@example.com',
                'status' => 1,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],
            [
                'first_name' => 'Grace',
                'last_name' => 'Huels',
                'email' => 'khickle@example.com',
                'status' => 0,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],
            [
                'first_name' => 'Catherine',
                'last_name' => 'Collier',
                'email' => 'madelynn.windler@example.com',
                'status' => 0,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],
            [
                'first_name' => 'Caesar',
                'last_name' => 'Donnelly',
                'email' => 'wferry@example.org',
                'status' => 1,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],
            [
                'first_name' => 'Maritza',
                'last_name' => 'Bins',
                'email' => 'jermain.pacocha@example.net',
                'status' => 0,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],

        ]);
    }
}
