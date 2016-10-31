<?php

namespace App\Http\Requests;

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
            'fdid' => 'alpha_num|nullable',
            'name' => 'required|max:255',
            'hq_address1' => 'required|alpha_num',
            'hq_city' => 'required|alpha',
            'hq_state' => 'required|alpha',
            'hq_zip' => 'required|alpha_dash',
            'mail_address1' => 'alpha_num|nullable',
            'mail_address2' => 'alpha_num|nullable',
            'mail_po_box' => 'alpha_dash|nullable',
            'mail_city' => 'alpha|nullable',
            'mail_state' => 'alpha|nullable',
            'mail_zip' => 'alpha_dash|nullable',
            'hq_phone' => 'required|alpha_dash|nullable',
            'hq_fax' => 'alpha_dash|nullable',
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
