<?php

namespace App\Providers;

use App\Channels\TwilioChannel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class TwilioProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(TwilioChannel::class, static function(Application $app) {
            return new TwilioChannel(
                new Client(config('twilio.account_sid'), config('twilio.auth_token')),
                config('twilio.sms_from')
            );
        });
    }

    public function provides()
    {
        return [
            TwilioChannel::class,
        ];
    }
}
