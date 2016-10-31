<?php

namespace App\Http\Controllers\Settings\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateNotificationDetailsRequest;

class NotificationDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the user's notification details.
     *
     * @return Response
     */
    public function update(UpdateNotificationDetailsRequest $request)
    {
        $request->user()->forceFill([
            'app_notification' => $request->app_notification,
            'email_notification' => $request->email_notification,
            'sms_notification' => $request->sms_notification,
            'sms_phone' => $request->sms_phone,
            'notification_states' => json_encode($request->notification_states)
        ])->save();
    }
}
