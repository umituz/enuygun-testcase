<?php

namespace App\Repositories;

use App\Models\Provider;
use App\Models\Task;

/**
 * Class TaskRepository
 */
class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{

    private Task $task;

    public function __construct(Task $task)
    {
        parent::__construct($task);

        $this->task = $task;
    }
}
