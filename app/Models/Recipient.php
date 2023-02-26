<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class Recipient
{
    use Notifiable;

    public function __construct(protected string $email, protected string $phone) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }


    // Notification routes for different channels

    public function routeNotificationForMail(): string
    {
        return $this->getEmail();
    }

    public function routeNotificationForVonage(): string
    {
        return $this->getPhone();
    }

    public function routeNotificationForTwilio(): string
    {
        return $this->getPhone();
    }
}
