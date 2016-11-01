<?php

namespace App\Http\Controllers\Pages;

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
        $paidPositions = Position::where('position_type', 'full-time')
                                ->orWhere('position_type', 'paid-on-call')
                                ->orWhere('position_type', 'contractor')
                                ->get();

        $unpaidPositions = Position::where('position_type', 'part-time')
                                    ->orWhere('position_type', 'volunteer')
                                    ->get();


        if ($state) {
            $paidPositions = Position::where([['state', $state],['position_type', 'full-time']])
                                    ->orWhere([['state', $state],['position_type', 'paid-on-call']])
                                    ->orWhere([['state', $state],['position_type', 'contractor']])
                                    ->get();

            $unpaidPositions = Position::where([['state', $state],['position_type', 'part-time']])
                                    ->orWhere([['state', $state],['position_type', 'volunteer']])
                                    ->get();
        }
        
        return view('pages.positions', compact('paidPositions', 'unpaidPositions', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        return view('position', compact('position', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
