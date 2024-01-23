<?php

namespace App\Services\Api;

/**
 * Interface BaseApiServiceInterface
 */
interface ApiServiceInterface
{
    /**
     * @return string[]
     */
    public function getData($provider);
}
