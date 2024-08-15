<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use Illuminate\Console\Command;
use App\Services\CurrencyRateService;

class FetchExchangeRates extends Command
{
    protected $signature = 'fetch:exchange-rates';
    protected $description = 'Fetch exchange rates from APIs and store them in the database';

    protected $currencyRateService;

    public function __construct(CurrencyRateService $currencyRateService)
    {
        parent::__construct();
        $this->currencyRateService = $currencyRateService;
    }

    public function handle()
    {
        $rates = $this->currencyRateService->getCheapestRates();

        foreach ($rates as $currency => $rate) {
            ExchangeRate::updateOrCreate(
                ['currency' => $currency],
                ['rate' => $rate]
            );
        }

        $this->info('Exchange rates have been successfully updated.');
    }
}
