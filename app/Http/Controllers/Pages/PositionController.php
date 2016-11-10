<?php

namespace App\Http\Controllers\Pages;

use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $paidPositions = Position::where([['position_type', 'full-time'],['active', '1']])
                                ->orWhere([['position_type', 'paid-on-call'],['active', '1']])
                                ->orWhere([['position_type', 'contractor'],['active', '1']])
                                ->get();

        $unpaidPositions = Position::where([['position_type', 'part-time'],['active', '1']])
                                    ->orWhere([['position_type', 'volunteer'],['active', '1']])
                                    ->get();


        if ($state) {
            $paidPositions = Position::where([['state', $state],['position_type', 'full-time'],['active', '1']])
                                    ->orWhere([['state', $state],['position_type', 'paid-on-call'],['active', '1']])
                                    ->orWhere([['state', $state],['position_type', 'contractor'],['active', '1']])
                                    ->get();

            $unpaidPositions = Position::where([['state', $state],['position_type', 'part-time'],['active', '1']])
                                    ->orWhere([['state', $state],['position_type', 'volunteer'],['active', '1']])
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
        $department = Department::find($position->department_id);
        $user = Auth::user();

        if ($position->position_type === 'full-time' || $position->position_type === 'paid-on-call' || $position->position_type === 'contractor') {
            if (! $user) {
                return redirect('/register');
            } elseif ($user && ! $user->subscribed()) {
                return redirect('/settings#/subscription');
            }
        }
        
        return view('pages.position.position', compact('position', 'department'));
    }
}
