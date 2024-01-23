<?php

namespace App\Repositories;

use App\Models\Provider;

/**
 * Class SourceRepository
 */
class ProviderRepository extends BaseRepository implements ProviderRepositoryInterface
{
    private Provider $provider;

    public function __construct(Provider $provider)
    {
        parent::__construct($provider);

        $this->provider = $provider;
    }
}
