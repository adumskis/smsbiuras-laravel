<?php

namespace Adumskis\SmsBiurasLaravel\Providers;

use Adumskis\SmsBiurasPhp\SmsBiuras;
use Illuminate\Support\ServiceProvider;

class SmsBiurasServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sms_biuras.php' => config_path('sms_biuras.php')
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton(SmsBiuras::class, function ($app) {
            $config = $app['config']->get('sms_biuras');

            if (!$config) {
                throw new \RuntimeException('Config file is missing');
            }
            if (!isset($config['username'])) {
                throw new \RuntimeException('Please set username in config file');
            }
            if (!isset($config['password'])) {
                throw new \RuntimeException('Please set password in config file');
            }

            return new SmsBiuras($config);
        });
    }

    public function provides()
    {
        return [SmsBiuras::class];
    }
}