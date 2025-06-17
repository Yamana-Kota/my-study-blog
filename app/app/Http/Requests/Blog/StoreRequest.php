<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\{FormRequest};

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'mimetypes:image/jpeg,image/png'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => '題名',
            'content' => '説明文',
            'image' => '画像URL',
        ];
    }
}
