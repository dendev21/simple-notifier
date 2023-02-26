<?php

namespace App\Providers;

use App\Components\Notifier;
use App\Notifications\SmtpEmail;
use App\Notifications\TwilioSMS;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class NotifierProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->tag([SmtpEmail::class, TwilioSMS::class], 'active-notifications');

        $this->app->bind(Notifier::class, static function(Application $app) {
            return new Notifier($app->tagged('active-notifications'));
        });
    }

    public function provides()
    {
        return [
            Notifier::class,
        ];
    }
}
