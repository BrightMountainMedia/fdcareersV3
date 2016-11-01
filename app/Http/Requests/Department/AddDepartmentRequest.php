<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class AddDepartmentRequest extends FormRequest
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
            'owner_id' => 'required|numeric',
            'email' => 'email|nullable',
            'fdid' => 'string|nullable',
            'name' => 'required|max:255',
            'hq_address1' => 'required|string',
            'hq_city' => 'required|string',
            'hq_state' => 'required|string',
            'hq_zip' => 'required|string',
            'mail_address1' => 'string|nullable',
            'mail_address2' => 'string|nullable',
            'mail_po_box' => 'string|nullable',
            'mail_city' => 'string|nullable',
            'mail_state' => 'string|nullable',
            'mail_zip' => 'string|nullable',
            'hq_phone' => 'required|string|nullable',
            'hq_fax' => 'string|nullable',
            'county' => 'string|nullable',
            'website' => 'string|nullable',
            'stations' => 'numeric|nullable',
            'active_ff_career' => 'numeric|nullable',
            'active_ff_volunteer' => 'numeric|nullable',
            'active_ff_paid_per_call' => 'numeric|nullable',
            'non_ff_civilian' => 'numeric|nullable',
            'non_ff_volunteer' => 'numeric|nullable',
            'primary_agency_for_em' => 'boolean|nullable',
            'updated_at' => 'date',
        ];
    }
}
