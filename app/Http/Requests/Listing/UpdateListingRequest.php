<?php

namespace App\Http\Requests\Listing;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListingRequest extends FormRequest
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
        $listing = $this->route('listing');
        $listingId = $listing->id;
        return [
            'title' => 'required|string|max:255',
            'company' => 'required|unique:listings,company,'.$listingId,
            'email' => 'required|email|unique:listings,email,' . $listingId,
            'location' => 'required|string|max:255',
            'website' => 'required|string|max:50',
            'tags' => 'required|max:255',
            'description' => 'required|max:2000',
            'logo' => 'nullable|mimes:png,jpg|max:2024',
        ];
    }
}
