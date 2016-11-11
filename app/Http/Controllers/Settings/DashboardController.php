<?php

namespace App\Http\Controllers\Settings;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Position;
use App\Department;
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
        // $this->middleware('auth');
        $this->middleware('subscribed');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $notification_states = User::select('notification_states')->where('id', $user->id)->first();
        $states = json_decode($notification_states->notification_states);

        foreach ( $states as $state ) {
            if ( $state === 'AL' ) {
                $alabama = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'AK' ) {
                $alaska = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'AZ' ) {
                $arizona = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'AR' ) {
                $arkansas = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'CA' ) {
                $california = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'CO' ) {
                $colorado = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'CT' ) {
                $connecticut = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'DE' ) {
                $delaware = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'DC' ) {
                $district_of_columbia = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'FL' ) {
                $florida = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'GA' ) {
                $georgia = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'HI' ) {
                $hawaii = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'ID' ) {
                $idaho = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'IL' ) {
                $illinois = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'IN' ) {
                $indiana = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'IA' ) {
                $iowa = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'KS' ) {
                $kansas = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'KY' ) {
                $kentucky = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'LA' ) {
                $louisiana = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'ME' ) {
                $maine = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MD' ) {
                $maryland = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MA' ) {
                $massachusetts = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MI' ) {
                $michigan = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MN' ) {
                $minnesota = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MS' ) {
                $mississippi = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MO' ) {
                $missouri = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'MT' ) {
                $montana = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NE' ) {
                $nebraska = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NV' ) {
                $nevada = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NH' ) {
                $new_hampshire = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NJ' ) {
                $new_jersey = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NM' ) {
                $new_mexico = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NY' ) {
                $new_york = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'NC' ) {
                $north_carolina = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'ND' ) {
                $north_dakota = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'OH' ) {
                $ohio = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'OK' ) {
                $oklahoma = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'OR' ) {
                $oregon = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'PA' ) {
                $pennsylvania = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'RI' ) {
                $rhode_island = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'SC' ) {
                $south_carolina = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'SD' ) {
                $south_dakota = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'TN' ) {
                $tennessee = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'TX' ) {
                $texas = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'UT' ) {
                $utah = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'VT' ) {
                $vermont = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'VA' ) {
                $virginia = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'WA' ) {
                $washington = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'WV' ) {
                $west_virginia = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'WI' ) {
                $wisconsin = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
            if ( $state === 'WY' ) {
                $wyoming = Position::where('state', $state)->published()->active()->orderBy('publish', 'DESC')->limit(5)->get();
            }
        }

        $saved = DB::table('positions_saved')->where('user_id', $user->id)->get();
        $savedPositions = [];
        foreach ( $saved as $position ) {
            array_push($savedPositions, $position->position_id);
        }
        $saved_positions = Position::whereIn('id', $savedPositions)->get();

        $applied = DB::table('positions_applied')->where('user_id', $user->id)->get();
        $appliedPositions = [];
        foreach ( $applied as $position ) {
            array_push($appliedPositions, $position->position_id);
        }
        $applied_positions = Position::whereIn('id', $appliedPositions)->get();

        return view('settings.dashboard', compact('alabama', 'alaska', 'arizona', 'arkansas', 'california', 'colorado', 'connecticut', 'delaware', 'district_of_columbia', 'florida', 'georgia', 'hawaii', 'idaho', 'illinois', 'indiana', 'iowa', 'kansas', 'kentucky', 'louisiana', 'maine', 'maryland', 'massachusetts', 'michigan', 'minnesota', 'mississippi', 'missouri', 'montana', 'nebraska', 'nevada', 'new_hampshire', 'new_jersey', 'new_mexico', 'new_york', 'north_carolina', 'north_dakota', 'ohio', 'oklahoma', 'oregon', 'pennsylvania', 'rhode_island', 'south_carolina', 'south_dakota', 'tennessee', 'texas', 'utah', 'vermont', 'virginia', 'washington', 'west_virginia', 'wisconsin', 'wyoming', 'saved_positions', 'applied_positions'));
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
        DB::table('positions_applied')->insert([
            'position_id' => $id,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json(['applied' => 'The position has been marked applied.']);
    }

    /**
     * Remove a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeSavedPosition($id)
    {
        $user = Auth::user();
        DB::table('positions_saved')->where('position_id', $id)->where('user_id', $user->id)->delete();

        return response()->json(['saved' => 'The position has been removed.']);
    }

    /**
     * Remove a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeAppliedPosition($id)
    {
        $user = Auth::user();
        DB::table('positions_applied')->where('position_id', $id)->where('user_id', $user->id)->delete();

        return response()->json(['applied' => 'The position has been removed.']);
    }
}
