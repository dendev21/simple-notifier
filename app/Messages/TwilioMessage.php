<?php

declare(strict_types=1);

namespace App\Messages;

use Illuminate\Contracts\Support\Arrayable;

/**
 * API params go here
 * @see https://www.twilio.com/docs/sms/api/message-resource#create-a-message-resource
 */
final class TwilioMessage implements Arrayable
{
    public function __construct(private string $body) {}

    public function getBody(): string
    {
        return $this->body;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
