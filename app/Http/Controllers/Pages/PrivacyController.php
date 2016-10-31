<?php

namespace App\Http\Controllers\Pages;

use Parsedown;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    /**
     * Show the privacy policy for the application.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.privacy', [
            'privacy' => (new Parsedown)->text(file_get_contents(base_path('privacy.md')))
        ]);
    }
}
