<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'max:30', Rule::unique('project')->ignore($this->project)], //to edit the project without the needs to change the 'title' because is unique
            'sub_title' => 'nullable|max:100',
            'description' => 'required|max:400',
            'image' => 'nullable|max:255|url',
            'technologies' => 'exists:technologies,id'
        ];
    }
}
