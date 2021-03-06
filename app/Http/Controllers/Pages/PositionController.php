<?php

namespace App\Http\Controllers\Pages;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Department;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($state = null)
    {
        $departments = Department::all();
        $paidPositions = Position::where([['position_type', 'full-time'],['active', '1'],['publish', '<=', Carbon::now()]])
                                ->orWhere([['position_type', 'paid-on-call'],['active', '1'],['publish', '<=', Carbon::now()]])
                                ->orWhere([['position_type', 'contractor'],['active', '1'],['publish', '<=', Carbon::now()]])
                                ->orWhere([['position_type', 'seasonal'],['active', '1'],['publish', '<=', Carbon::now()]])
                                ->get();

        $unpaidPositions = Position::where([['position_type', 'part-time'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->orWhere([['position_type', 'volunteer'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->get();


        if ($state) {
            $paidPositions = Position::where([['state', $state],['position_type', 'full-time'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->orWhere([['state', $state],['position_type', 'paid-on-call'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->orWhere([['state', $state],['position_type', 'contractor'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->orWhere([['state', $state],['position_type', 'seasonal'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->get();

            $unpaidPositions = Position::where([['state', $state],['position_type', 'part-time'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->orWhere([['state', $state],['position_type', 'volunteer'],['active', '1'],['publish', '<=', Carbon::now()]])
                                    ->get();
        }
        
        return view('pages.position.positions', compact('paidPositions', 'unpaidPositions', 'departments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        if ( $position->imported === 1 ) {
            $department = Department::where('oldId', $position->department_id)->first();
        } else {
            $department = Department::find($position->department_id);
        }
        
        $user = Auth::user();
        
        if ( $position->active == 1 ) {
            if ($position->position_type === 'full-time' || $position->position_type === 'paid-on-call' || $position->position_type === 'contractor' || $position->position_type === 'seasonal') {
                if ( ! $user ) {
                    return redirect('/register');
                } elseif ( $user && ! $user->subscribed() ) {
                    return redirect('/settings#/subscription');
                }
            }

            if ( $user && $user->subscribed() ) {
                $saved = DB::table('positions_saved')->where('position_id', $position->id)->where('user_id', $user->id)->first();
                $applied = DB::table('positions_applied')->where('position_id', $position->id)->where('user_id', $user->id)->first();
                return view('pages.position.position', compact('position', 'department', 'saved', 'applied'));
            }

            return view('pages.position.position', compact('position', 'department'));
        }

        if ( ! $position->active && $position->publish > Carbon::now() ) {
            return view('pages.position.position')->with('info', 'This position is scheduled to be posted on '.date('l, F m, Y @ h:i A', strtotime($position->publish)).'.');
        }

        return view('pages.position.position')->with('info', 'This position is not active at this time.');
    }
}
