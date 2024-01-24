<?php

namespace App\Jobs\Api;

use App\Services\Api\ProviderSourceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class GetGuardianApiJob
 */
class GetProviderApiDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $provider;

    /**
     * Create a new job instance.
     */
    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Execute the job.
     */
    public function handle(
        ProviderSourceService $providerSourceService
    ): void {
        $providerSourceService->getData($this->provider);
    }
}
