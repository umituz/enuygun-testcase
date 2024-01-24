<?php

namespace App\Observers;

use App\Models\Task;
use App\Services\Log\LogService;

class TaskObserver
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function created(Task $task)
    {
        $this->logService->logInfo(__('Task created: ') . $task->id);
    }
}
