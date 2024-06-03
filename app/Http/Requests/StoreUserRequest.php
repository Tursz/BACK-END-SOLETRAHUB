<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>['required','string','max:255'],
            'nickname' =>['required','string','min:3','max:40','unique:users,nickname'],
            'email' =>['required','string','email','max:255','unique:users,email'],
            'password' => ['nullable','string','min:5'],
            'avatar' => ['nullable','image:jpg, jpeg, png, bmp, gif, svg, webp']
        ];
    }

}
