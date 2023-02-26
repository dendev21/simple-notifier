<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Channels\TwilioChannel;
use App\Messages\TwilioMessage;
use Illuminate\Notifications\Notification;

class TwilioSMS extends Notification implements HasMessage
{
    use NotificationHasMessage;

    public function via(object $notifiable): string
    {
        return TwilioChannel::class;
    }

    public function toTwilio(object $notifiable): TwilioMessage
    {
        return new TwilioMessage($this->message);
    }
}
