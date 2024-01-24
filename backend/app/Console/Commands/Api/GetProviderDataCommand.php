<?php

namespace App\Console\Commands\Api;

use App\Jobs\Api\GetProviderApiDataJob;
use App\Services\Base\ProviderService;
use App\Services\Database\DatabaseConnectionService;
use Illuminate\Console\Command;

class GetProviderDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:tasks {provider? : The identifier of the provider}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from a specific provider';

    private ProviderService $providerService;

    public function __construct(ProviderService $providerService)
    {
        parent::__construct();

        $this->providerService = $providerService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->checkDatabase();

        $providerIdentifier = $this->argument('provider');

        if (!$providerIdentifier) {
            $providers = $this->providerService->providersList();

            if ($providers == null) {
                $this->error(__('No providers available.'));

                return Command::FAILURE;
            }

            $providerIdentifier = $this->anticipate(__('You need to choose a provider before moving...'), $providers);
        }

        $item = $this->providerService->findBy('identifier', $providerIdentifier);

        if (!$item) {
            $this->error(__('We could not find that provider.'));

            return Command::FAILURE;
        }

        GetProviderApiDataJob::dispatch($item);

        $this->info(__('Fetching data from the selected provider...'));

        return Command::SUCCESS;
    }

    public function checkDatabase()
    {
        try {
            DatabaseConnectionService::getInstance();
        } catch (\Exception $e) {
            $this->error($e->getMessage());

            exit(Command::FAILURE);
        }
    }
}
