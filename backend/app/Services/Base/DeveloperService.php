<?php

namespace App\Services\Base;

use App\Repositories\DeveloperRepositoryInterface;

class DeveloperService
{
    private DeveloperRepositoryInterface $developerRepository;

    public function __construct(DeveloperRepositoryInterface $developerRepository)
   {
       $this->developerRepository = $developerRepository;
   }

    public function all()
    {
        return $this->developerRepository->get();
   }

    public function saveWithTasks($data)
    {
        return $this->developerRepository->saveWithTasks($data);
   }

    public function getWithTasks()
    {
        return $this->developerRepository->getWithTasks();
    }
}
