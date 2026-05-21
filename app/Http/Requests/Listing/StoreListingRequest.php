<?php

namespace App\Http\Requests\Listing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreListingRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'company' => 'required|unique:listings,company',
            'email' => 'required|email|unique:listings,email',
            'location' => 'required|string|max:255',
            'website' => 'required|string|max:200',
            'tags' => 'required|max:255',
            'description' => 'required|max:2000',
            'logo' => 'nullable|mimes:png,jpg|max:2024',
        ];
    }
}
