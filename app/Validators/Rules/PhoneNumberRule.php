<?php

declare(strict_types=1);

namespace App\Validators\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class PhoneNumberRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[+]?\d{8,16}$/', $value)) {
            $fail('The :attribute format is invalid.');
        }
    }
}
