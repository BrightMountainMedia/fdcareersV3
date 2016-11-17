<?php

namespace App\Http\Controllers\Pages;

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
