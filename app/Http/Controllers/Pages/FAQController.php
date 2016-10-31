<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.faq');
    }
}
