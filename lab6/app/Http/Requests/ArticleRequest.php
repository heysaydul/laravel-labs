<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date'              => ['required', 'date'],
            'title'             => ['required', 'string', 'min:3', 'max:255'],
            'short_description' => ['required', 'string', 'max:255'],
            'description'       => ['required', 'string', 'min:10'],
            'preview_image'     => ['required', Rule::in(Article::PREVIEWS)],
            'full_image'        => ['required', Rule::in(Article::FULLS)],
        ];
    }
}
