<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RssPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['URL' => "string[]"])]
    public function rules(): array
    {
        return [
            'URL' => [
                'URL',
                'required',
                'regex:/https:\/\/\w+\.(\w+).\w+\/rss|https:\/\/(\w+).\w+\/rss/i',
                'unique:App\Models\Rss,rssLink']
        ];
    }
}
