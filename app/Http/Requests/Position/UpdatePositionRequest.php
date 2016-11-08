<?php

namespace App\Http\Requests\Position;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
            'department_id' => 'required|numeric',
            'title' => 'required|max:255',
            'position_type' => 'required',
            'state' => 'required',
            'ending' => 'required',
            'duedate' => 'required_if:ending,duedate',
            'application_details' => 'required',
            'featured' => 'required|boolean',
            'active' => 'required|boolean',
        ];
    }
}
