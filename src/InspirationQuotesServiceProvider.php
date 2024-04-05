<?php

namespace BodhiPrerna\InspirationQuotes;

use Illuminate\Support\ServiceProvider;
use BodhiPrerna\InspirationQuotes\Commands\InspireCommand;

class InspirationQuotesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InspireCommand::class,
            ]);
        }
    }
}
