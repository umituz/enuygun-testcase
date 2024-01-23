<?php

namespace App\Http\Controllers\Api;

use App\Services\Base\TaskService;

class TasksController extends BaseController
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $data = $this->taskService->getTaskList();

        return $this->ok(
            data: $data,
        );
    }
}
