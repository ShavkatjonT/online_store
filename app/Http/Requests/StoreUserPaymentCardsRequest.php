<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPaymentCardsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => ['required'],
            "number" => ['required'],
            "exp_date" => ['required'],
            "holder_name" => ['required'],
            'payment_card_type_id' => ['required', 'exists:payment_card_types,id'],
        ];
    }
}
