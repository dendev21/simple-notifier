<?php

declare(strict_types=1);

namespace App\Notifications;

interface HasMessage
{
    public function setMessage(string $message): void;
}
