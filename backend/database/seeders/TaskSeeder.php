<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Task::factory(5)->create();

        \DB::table('tasks')->delete();

        \DB::table('tasks')->insert(array (
                array (
                    'developer_id' => 1,
                    'name' => 'nemo',
                    'hour' => 72.85,
                    'difficulty' => 5,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-17 14:44:59',
                    'updated_at' => '2024-01-17 14:44:59',
                ),
                array (
                    'developer_id' => 2,
                    'name' => 'tenetur',
                    'hour' => 53.37,
                    'difficulty' => 5,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-17 14:44:59',
                    'updated_at' => '2024-01-17 14:44:59',
                ),
                array (
                    'developer_id' => 3,
                    'name' => 'et',
                    'hour' => 37.72,
                    'difficulty' => 4,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-17 14:44:59',
                    'updated_at' => '2024-01-17 14:44:59',
                ),
                array (
                    'developer_id' => 4,
                    'name' => 'ea',
                    'hour' => 45.55,
                    'difficulty' => 5,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-17 14:44:59',
                    'updated_at' => '2024-01-17 14:44:59',
                ),
                array (
                    'developer_id' => 5,
                    'name' => 'quidem',
                    'hour' => 65.97,
                    'difficulty' => 1,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-17 14:44:59',
                    'updated_at' => '2024-01-17 14:44:59',
                ),
        ));
    }
}
