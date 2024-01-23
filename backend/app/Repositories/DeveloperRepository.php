<?php

namespace App\Repositories;

use App\Models\Developer;
use Exception;

/**
 * Class DeveloperRepository
 */
class DeveloperRepository extends BaseRepository implements DeveloperRepositoryInterface
{
    private Developer $developer;

    public function __construct(Developer $developer)
    {
        parent::__construct($developer);

        $this->developer = $developer;
    }

    public function getWithTasks()
    {
        return $this->developer
            ->with('tasks')
            ->where('status', true)
            ->get();
    }

    public function saveWithTasks($data)
    {
        try {
            foreach ($data as $developerData) {
                $developer = $this->developer->create([
                    'first_name' => $developerData['first_name'],
                    'last_name' => $developerData['last_name'],
                    'email' => $developerData['email'],
                ]);

                if (isset($developerData['tasks']) && is_array($developerData['tasks'])) {
                    $tasksData = collect($developerData['tasks'])->map(function ($taskData) {
                        return [
                            'name' => $taskData['name'],
                            'hour' => $taskData['hour'],
                            'difficulty' => $taskData['difficulty'],
                        ];
                    })->toArray();

                    $developer->tasks()->createMany($tasksData);
                }
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

}
