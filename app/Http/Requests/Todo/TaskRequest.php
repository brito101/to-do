<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:1|max:191',
            'description' => 'required|min:1|max:191',
            'done' => 'nullable|boolean',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
