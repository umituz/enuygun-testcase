<?php

namespace App\Services\Base;

use App\Repositories\ProviderRepositoryInterface;

class ProviderService
{
    private ProviderRepositoryInterface $providerRepository;

    public function __construct(ProviderRepositoryInterface $providerRepository)
    {
        $this->providerRepository = $providerRepository;
    }

    /**
     * @return mixed
     */
    public function findBy($key, $value)
    {
        return $this->providerRepository->findBy($key, $value);
    }

    /**
     * @return mixed
     */
    public function exists($key, $value)
    {
        return $this->providerRepository->exists($key, $value);
    }

    public function providersList()
    {
        $providers =  $this->providerRepository->get();

        return $providers->pluck('identifier')->toArray();
    }
}
