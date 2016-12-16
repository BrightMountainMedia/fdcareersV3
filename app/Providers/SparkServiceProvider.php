<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Bright Mountain Media, Inc.',
        'product' => 'FDC Subscription',
        'street' => 'PO Box 810012',
        'location' => 'Boca Raton, FL 33481',
        'phone' => '561-998-2440',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'support@fdcareers.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'mstoffer@brightmountainmedia.com',
        'susan@brightmountainmedia.com',
        'gwen@brightmountainmedia.com',
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = false;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe();
        Spark::useTwoFactorAuth();
        Spark::collectBillingAddress();
        Spark::noProrate();

        Spark::plan('Monthly Subscription', 'fdc-monthly')
            ->price(8.95)
            ->features([
                'Acess to our database of over 800 active jobs.',
                'Job alerts to your inbox.',
                'Links that allow you to download the application documents you need.',
                'The opportunity to focus on getting hired... not chasing down who is hiring.'
            ]);

        Spark::plan('3 Month Subscription', 'fdc-3-month')
            ->price(22)
            ->features([
                'Acess to our database of over 800 active jobs.',
                'Job alerts to your inbox.',
                'Links that allow you to download the application documents you need.',
                'The opportunity to focus on getting hired... not chasing down who is hiring.'
            ]);

        Spark::plan('6 Month Subscription', 'fdc-6-month')
            ->price(44)
            ->features([
                'Acess to our database of over 800 active jobs.',
                'Job alerts to your inbox.',
                'Links that allow you to download the application documents you need.',
                'The opportunity to focus on getting hired... not chasing down who is hiring.'
            ]);

        Spark::plan('Yearly Subscription', 'fdc-yearly')
            ->price(77)
            ->features([
                'Acess to our database of over 800 active jobs.',
                'Job alerts to your inbox.',
                'Links that allow you to download the application documents you need.',
                'The opportunity to focus on getting hired... not chasing down who is hiring.'
            ]);

        Spark::validateUsersWith(function () {
            return [
                'app_notification' => 'required|boolean',
                'email_notification' => 'required|boolean',
                'sms_notification' => 'required|boolean',
                'notification_states' => 'required_if:app_notification,1|required_if:email_notification,1|required_if:sms_notification,1',
                'sms_phone' => 'required_if:sms_notification,1',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'vat_id' => 'max:50|vat_id',
                'terms' => 'required|accepted',
            ];
        });

        Spark::createUsersWith(function ($request) {
            $user = Spark::user();

            $data = $request->all();

            $user->forceFill([
                'app_notification' => $data['app_notification'],
                'email_notification' => $data['email_notification'],
                'sms_notification' => $data['sms_notification'],
                'notification_states' => json_encode($data['notification_states']),
                'sms_phone' => $data['sms_phone'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'last_read_announcements_at' => Carbon::now(),
                'trial_ends_at' => Carbon::now()->addDays(Spark::trialDays()),
            ])->save();

            return $user;
        });

        Spark::searchUsersWith(function ($query, $excludeUser = null) {
            $search = Spark::user()->with('subscriptions');

            // If a user to exclude was passed to the repository, we will exclude their User
            // ID from the list. Typically we don't want to show the current user in the
            // search results and only want to display the other users from the query.
            if ($excludeUser) {
                $search->where('id', '<>', $excludeUser->id);
            }

            return $search->where(function ($search) use ($query) {
                $search->where('email', 'like', $query)
                       ->orWhere('first_name', 'like', $query)
                       ->orWhere('last_name', 'like', $query);
            })->get();
        });
    }
}
