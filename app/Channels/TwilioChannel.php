<?php

declare(strict_types=1);

namespace App\Channels;

use App\Messages\TwilioMessage;
use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

final class TwilioChannel
{
    public function __construct(private Client $client, private string $from) {}

    public function send($notifiable, Notification $notification): void
    {
        $recipientPhone = $notifiable->routeNotificationFor('twilio', $notification);

        if ($recipientPhone === null) {
            return;
        }

        /** @var TwilioMessage $message */
        $message = $notification->toTwilio($notifiable);

        $this->client->messages->create($recipientPhone, [
            'from' => $this->from,
            ...$message->toArray()
        ]);
    }
}
