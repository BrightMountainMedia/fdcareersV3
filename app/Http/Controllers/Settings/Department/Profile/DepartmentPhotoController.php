<?php

namespace App\Http\Controllers\Settings\Department\Profile;

use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Department;
use App\Http\Controllers\Controller;

class DepartmentPhotoController extends Controller
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
     * Store the user's profile photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $photo = $request->file('photo')->store('public/profiles');
        $photo = str_replace('public', '/storage', $photo);
        Department::where('id', $id)
            ->update([
                'photo_url' => $photo, 
                'updated_at' => Carbon::now()
            ]);

        return $photo;
    }
}
