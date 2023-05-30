<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [ // check database/Models/_create_project_table_
            'title' => 'required|max:30|unique:project',
            'sub_title' => 'required|max:100',
            'description' => 'required|max:400',
            'image' => 'nullable|url',
            'skill_id' => 'nullable|exists:skills,id',
            'technologies' => 'exists:technologies,id'
        ];
    }
}
