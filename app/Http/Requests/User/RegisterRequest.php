<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_document_number'    => 'required|regex:/[0-9]{11}/i',
            'user_name'               => 'required',
            'company_document_number' => 'required|regex:/[0-9]{14}/i',
            'company_name'            => 'required',
            'email'                   => 'required|email',
            'password'                => 'required',
        ];
    }
}
