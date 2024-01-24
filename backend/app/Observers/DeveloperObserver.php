<?php

namespace App\Observers;

use App\Models\Developer;
use App\Services\Log\LogService;

class DeveloperObserver
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function created(Developer $developer)
    {
        $this->logService->logInfo(__('Developer created: ') . $developer->id);
    }
}
