<?php

namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.book.edit', $this->book);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'anno' => ['sometimes', 'date'],
            'author' => ['sometimes', 'string'],
            'coauthor' => ['nullable', 'string'],
            'editore' => ['sometimes', 'string'],
            'link' => ['nullable', 'string'],
            'link_two' => ['nullable', 'string'],
            'link_three' => ['nullable', 'string'],
            'title' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
