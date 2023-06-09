<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'whats_app_number' => ['required'],
            'whats_app_message' => ['required'],
            'youtube_vid_url' => ['required'],
            'quotation_txt' => ['required'],
            'header_footer_qut' => ['required'],
            'tiktok_url' => ['required'],
            'insta_url' => ['required'],
        ];
    }
}
