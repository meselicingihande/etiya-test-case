<?php

namespace App\Providers;

use App\Services\CurrencyRateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CurrencyRateService::class, function ($app) {
            $providers = config('services.exchange_rates');
            return new CurrencyRateService($providers);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
