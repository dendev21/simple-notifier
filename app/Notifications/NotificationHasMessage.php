<?php

declare(strict_types=1);

namespace App\Notifications;

trait NotificationHasMessage
{
    protected string $message;

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
