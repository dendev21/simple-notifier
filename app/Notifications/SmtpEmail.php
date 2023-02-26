<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SmtpEmail extends Notification implements HasMessage
{
    use NotificationHasMessage;

    public function via(object $notifiable): string
    {
        return MailChannel::class;
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
            ->mailer('smtp')
            ->line($this->message);
    }
}
