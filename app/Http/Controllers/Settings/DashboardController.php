<?php

namespace App\Http\Controllers\Settings;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Position;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('subscribed');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('settings.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSavedPosition($id)
    {
        $user = Auth::user();
        $user_positions = DB::table('positions_saved')->where('user_id', $user->id)->get();

        foreach ( $user_positions as $position ) {
            if ( $position->position_id == $id ) {
                return response()->json(['saved' => 'This position has already been saved.']);
            }
        }

        DB::table('positions_saved')->insert([
            'position_id' => $id,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json(['saved' => 'The position has been saved.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAppliedPosition($id)
    {
        $user = Auth::user();
        $user_positions = DB::table('positions_applied')->where('user_id', $user->id)->get();

        foreach ( $user_positions as $position ) {
            if ( $position->position_id == $id ) {
                return response()->json(['applied' => 'This position has already been marked applied.']);
            }
        }

        DB::table('positions_applied')->insert([
            'position_id' => $id,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json(['applied' => 'The position has been marked applied.']);
    }
}
