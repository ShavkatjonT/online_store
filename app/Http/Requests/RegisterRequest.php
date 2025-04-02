<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /*
      hello world



      */
    public function rules(): array
    {
        return [
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns'],
            'phone' => ['required','unique:users'],
            'password' => ['required','min:8',],
            'password_confirmation' => ['required','same:password'],
            'photo' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2000'],
        ];
    }
}
