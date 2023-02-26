<?php

declare(strict_types=1);

namespace App\Components;

use App\Models\Recipient;
use App\Notifications\HasMessage;

class Notifier
{
    protected ?Recipient $recipient = null;
    protected ?string $message = null;

    /**
     * @param iterable<HasMessage> $notifications
     */
    public function __construct(protected iterable $notifications) {}

    public function send(): void
    {
        $this->invariant();
        foreach ($this->notifications as $notification) {
            $notification->setMessage($this->message);
            $this->recipient->notify($notification);
        }
    }

    public function setRecipient(Recipient $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    protected function invariant(): void
    {
        if ($this->recipient === null || $this->message === null) {
            throw new \InvalidArgumentException('recipient and message must be set.');
        }
    }
}
