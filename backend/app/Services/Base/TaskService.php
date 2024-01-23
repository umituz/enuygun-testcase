<?php

namespace App\Services\Base;

use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;

class TaskService
{
    private TaskRepositoryInterface $taskRepository;
    private SchedulerService $schedulerService;
    private DeveloperService $developerService;

    public function __construct(
        TaskRepositoryInterface $taskRepository,
        SchedulerService $schedulerService,
        DeveloperService $developerService,
    )
   {
       $this->taskRepository = $taskRepository;
       $this->schedulerService = $schedulerService;
       $this->developerService = $developerService;
   }

    public function getHoursValue()
    {
        return $this->taskRepository->get()->sortByDesc('hour')->values();
   }

    public function getTaskList()
    {
        $developers = $this->developerService->all();
        $tasks = $this->getHoursValue();

        return $this->schedulerService->calculateWeeklyPlan($developers, $tasks);
   }
}
