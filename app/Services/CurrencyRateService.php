<?php

namespace App\Services;

use App\Providers\CurrencyProviderInterface;

class CurrencyRateService
{
    protected $providers;

    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    public function fetchRates(): array
    {
        $rates = [];

        foreach ($this->providers as $providerClass) {
            $providerInstance = app($providerClass);
            if (method_exists($providerInstance, 'fetchRates')) {
                $rates = array_merge($rates, $providerInstance->fetchRates());
            } else {
                throw new \Exception("Provider class {$providerClass} does not have a fetchRates method.");
            }
        }

        return $rates;
    }

    public function getCheapestRates(): array
    {
        $allRates = [];
        foreach ($this->providers as $providerClass) {
            $providerInstance = app($providerClass);
            $allRates[] = $providerInstance->fetchRates();
        }

        return $this->compareRates($allRates);
    }

    private function compareRates(array $allRates): array
    {
        $cheapestRates = [];
        foreach (['EUR', 'USD', 'GBP'] as $currency) {
            $currencyRates = array_column($allRates, $currency);
            $cheapestRates[$currency] = min($currencyRates);
        }
        return $cheapestRates;
    }
}
