<?php

namespace App\Console;

class Kernel
{
    protected $commands = [
        Commands\FetchExchangeRates::class,
    ];
}