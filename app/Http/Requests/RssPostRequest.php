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
        return true;
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

    #[ArrayShape([
        'URL.URL' => "string",
        'URL.required' => "string",
        'URL.regex' => "string",
        'URL.unique' => "string"
    ])]
    public function messages(): array
    {
        return [
            'URL.URL' => 'Это не URL',
            'URL.required' => 'Поле URL обязательно',
            'URL.regex' => 'URL не прошел валидацию',
            'URL.unique' => 'Данный RSS поток уже добавлен'
        ];
    }
}
