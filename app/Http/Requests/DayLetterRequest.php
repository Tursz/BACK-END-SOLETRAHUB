<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'letter_1' => ['required', 'min:1', 'max:1'],
            'letter_2' => ['required', 'min:1', 'max:1'],
            'letter_3' => ['required', 'min:1', 'max:1'],
            'letter_4' => ['required', 'min:1', 'max:1'],
            'letter_5' => ['required', 'min:1', 'max:1'],
            'letter_6' => ['required', 'min:1', 'max:1'],
            'letter_7' => ['required', 'min:1', 'max:1'],
            'letter_8' => ['required', 'min:1', 'max:1'],
        ];
    }
}
