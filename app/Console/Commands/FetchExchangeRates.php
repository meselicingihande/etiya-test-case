<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProviderOne;
use App\Services\ProviderTwo;
use App\Models\ExchangeRate;

class FetchExchangeRates extends Command
{
    protected $signature = 'fetch:rates';
    protected $description = 'Fetch exchange rates from providers and store them';

    public function handle()
    {
        $providers = [
            new ProviderOne(),
            new ProviderTwo(),
        ];

        $allRates = [];

        foreach ($providers as $provider) {
            $rates = $provider->getRates();
            foreach ($rates as $currency => $rate) {
                if (!isset($allRates[$currency]) || $rate < $allRates[$currency]) {
                    $allRates[$currency] = $rate;
                }
            }
        }

        foreach ($allRates as $currency => $rate) {
            ExchangeRate::updateOrCreate(
                ['currency' => $currency],
                ['rate' => $rate]
            );
        }

        $this->info('Exchange rates updated successfully.');
    }
}
