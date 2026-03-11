<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:1024',
                'dimensions:min_width=100,min_height=100,max_width=800,max_height=800',
            ],
        ];
    }
}