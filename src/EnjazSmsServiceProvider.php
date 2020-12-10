<?php

namespace Hsmfawaz\EnjazSms;

use Illuminate\Support\ServiceProvider;

class EnjazSmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/enjaz_sms.php', 'enjaz_sms');
        $this->publishConfig();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('enjaz-sms', function () {
            return new EnjazSms;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/enjaz_sms.php' => config_path('enjaz_sms.php'),
            ], 'config');
        }
    }
}
