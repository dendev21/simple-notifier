<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Notifications\Channels\VonageSmsChannel;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class VonageSMS extends Notification implements HasMessage
{
    use NotificationHasMessage;

    public function via(object $notifiable): string
    {
        return VonageSmsChannel::class;
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage())
            ->content($this->message);
    }
}
