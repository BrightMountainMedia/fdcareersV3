<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationDetailsRequest extends FormRequest
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
            'app_notification' => 'required|boolean',
            'email_notification' => 'required|boolean',
            'sms_notification' => 'required|boolean',
            'notification_states' => 'required_if:app_notification,1|required_if:email_notification,1|required_if:sms_notification,1',
            'sms_phone' => 'required_if:sms_notification,1',
        ];
    }
}
