<?php

namespace App\Repositories;

/**
 * Interface DeveloperRepositoryInterface
 */
interface DeveloperRepositoryInterface
{
    public function saveWithTasks($data);

    public function getWithTasks();
}
