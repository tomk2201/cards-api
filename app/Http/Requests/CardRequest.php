<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $cardId = $this->route('card');
        
        return [
            'card_number' => [
                'required',
                'digits:20',
                Rule::unique('cards')->ignore($cardId)
            ],
            'pin' => ['required', 'digits:4'],
            'activation_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date', 'after:activation_date'],
            'balance' => ['required', 'numeric', 'min:0']
        ];
    }
}