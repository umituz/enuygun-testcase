<?php

namespace App\Providers;

use App\Services\Provider\Provider1TaskService;
use App\Services\Provider\Provider2TaskService;
use App\Services\Provider\TaskProviderInterface;
use App\Services\Provider\TaskProviderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(TaskProviderInterface::class, function ($app) {
            $selectedProvider = config('services.providers.default');

            switch ($selectedProvider) {
                case 'provider1':
                    return $app->make(Provider1TaskService::class);
                case 'provider2':
                    return $app->make(Provider2TaskService::class);
                default:
                    throw new \Exception(__('Invalid task provider selected!'));
            }
        });
    }
}
