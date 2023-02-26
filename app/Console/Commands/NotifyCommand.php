<?php

namespace App\Console\Commands;

use App\Components\Notifier;
use App\Models\Recipient;
use App\Validators\Rules\PhoneNumberRule;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class NotifyCommand extends Command implements Isolatable
{
    protected $signature = 'notify {message=: The text message to be sent} {--email= : Email of a recipient} {--phone= : Phone number of a recipient}';

    protected $description = 'Sends the message to the all registered notifications';

    public function handle(ValidationFactory $validator, Notifier $notifier): void
    {
        $validated = $validator
            ->make(
                [
                    'email' => $this->option('email'),
                    'phone' => $this->option('phone'),
                    'message' => $this->argument('message'),
                ],
                [
                    'email' => 'required|email',
                    'phone' => ['required', new PhoneNumberRule()],
                    'message' => 'required|string|min:5|max:1024',
                ]
            )
            ->validate();

        $recipient = new Recipient($validated['email'], $validated['phone']);

        $notifier
            ->setMessage($validated['message'])
            ->setRecipient($recipient)
            ->send();
    }
}
