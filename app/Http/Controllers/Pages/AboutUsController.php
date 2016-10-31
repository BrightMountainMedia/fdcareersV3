<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    /**
     * Show the application about page.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.about');
    }
}
