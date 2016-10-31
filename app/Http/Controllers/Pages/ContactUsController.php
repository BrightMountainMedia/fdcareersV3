<?php

namespace App\Http\Controllers\Pages;

use Laravel\Spark\Spark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Notifications\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class ContactUsController extends Controller
{
    /**
     * Show the application contact page.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Send the contact form.
     *
     * @return Response
     */
    public function send(ContactFormRequest $request)
    {
        $user = User::find(1);

        $user->notify(new ContactForm($request->name, $request->email, $request->message));



        // return response()->json(['message' => 'Thank you for contacting us. We will get back to you soon.']);

        // if (Notification::send($users, new ContactForm($request->name, $request->email, $request->message))) {
            // return response()->json(['message' => 'Thank you for contacting us. We will get back to you soon.']);
        // }

        // return response()->json(['message' => 'Something is wrong.', 'users' => $users, 'request' => $request->all()]);
    }
}
