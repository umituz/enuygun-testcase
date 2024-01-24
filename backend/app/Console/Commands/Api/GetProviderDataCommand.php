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
    protected $signature = 'api:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from specific provider';

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

        $providers = $this->providerService->providersList();

        if ($providers == null) {
            return Command::FAILURE;
        }

        $identifier = $this->anticipate(__('You need to choose provider before moving...'), $providers);

        $item = $this->providerService->findBy('identifier', $identifier);

        if (! $item) {
            $this->info(__('We could not find that provider.'));

            return Command::FAILURE;
        }

        if ($item) {
            GetProviderApiDataJob::dispatch($item);

            return Command::SUCCESS;
        }

        return Command::FAILURE;
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
