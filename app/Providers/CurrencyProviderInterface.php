<?php

namespace App\Providers;

interface CurrencyProviderInterface
{
    public function fetchRates(): array;
}
