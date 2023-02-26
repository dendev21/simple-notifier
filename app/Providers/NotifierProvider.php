<?php

namespace App\Providers;

use App\Components\Notifier;
use App\Notifications\SmtpEmail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class NotifierProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->tag([SmtpEmail::class], 'active-notifications');

        $this->app->bind(Notifier::class, static function(Application $app) {
            return new Notifier($app->tagged('active-notifications'));
        });
    }

    public function boot(): void
    {
        //
    }
}
