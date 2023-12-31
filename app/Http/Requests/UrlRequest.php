<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Валидация запросов.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->id;
        return [
            'url_external' => ['required', 'string', 'url'],
            'url_internal' => ['sometimes', 'unique:urls,internal_url,' . $id],
            'url_name' => ['required', 'string'],
        ];
    }
}
