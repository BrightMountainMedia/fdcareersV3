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
        $users = User::whereIn('email', Spark::$developers)->get();

        if (Notification::send($users, new ContactForm($request->name, $request->email, $request->message))) {
            return response()->json(['message' => 'Thank you for contacting us. We will get back to you soon.']);
        }

        return response()->json(['error' => 'Something is wrong.']);
    }
}
