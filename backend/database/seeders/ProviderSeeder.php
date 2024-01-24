<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Provider::factory(2)->create();

        \DB::table('providers')->delete();

        \DB::table('providers')->insert([
            [
                'name' => 'Provider 1',
                'identifier' => 'provider1',
                'url' => 'https://run.mocky.io/v3/96c072a7-670e-4e6d-8328-3aaadece0d72',
                'is_default' => 1,
                'status' => 0,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],
            [
                'name' => 'Provider 2',
                'identifier' => 'provider2',
                'url' => 'https://run.mocky.io/v3/884723b0-a34f-45a1-a752-8d58571ba0e2',
                'is_default' => 0,
                'status' => 0,
                'deleted_at' => null,
                'created_at' => '2024-01-17 14:44:59',
                'updated_at' => '2024-01-17 14:44:59',
            ],
        ]);

    }
}
