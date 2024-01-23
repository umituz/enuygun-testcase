<?php

namespace App\Services\Provider;

class TaskProviderService
{
    private TaskProviderInterface $taskProvider;

    public function __construct(TaskProviderInterface $taskProvider)
    {
        $this->taskProvider = $taskProvider;
    }

    public function getTasks(): array
    {

        return $this->taskProvider->getTasks();
    }
}
