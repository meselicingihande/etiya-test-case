<?php

namespace App\Services;

interface ExchangesProviderInterface
{
    public function getRates(): array;
}
