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
    public function index($state = null, $per_page = 10)
    {
        $departments = Department::all();
        $user = Auth::user();

        if ( $state && $user && $user->subscribed() ) {
            $positions = Position::where('state', $state)->orderBy('position_type')->get();

            if ( count($positions) > $per_page ) {
                $positions = Position::where('state', $state)->orderBy('position_type')->paginate($per_page);
            }
        } else if ( $state && ! $user ) {
            $positions = Position::where([
                ['state', $state],
                ['position_type', '!=', 'full-time'],
                ['position_type', '!=', 'paid-on-call'],
                ['position_type', '!=', 'contractor'],
            ])->orderBy('position_type')->get();

            if ( count($positions) > $per_page ) {
                $positions = Position::where([
                    ['state', $state],
                    ['position_type', '!=', 'full-time'],
                    ['position_type', '!=', 'paid-on-call'],
                    ['position_type', '!=', 'contractor'],
                ])->orderBy('position_type')->paginate($per_page);
            }
        } else if ( $user && $user->subscribed() ) {
            $positions = Position::orderBy('position_type', 'asc')->orderBy('state', 'asc')->get();

            if ( count($positions) > $per_page ) {
                $positions = Position::orderBy('position_type', 'asc')->orderBy('state', 'asc')->paginate($per_page);
            }
        } else {
            $positions = Position::where([
                ['position_type', '!=', 'full-time'],
                ['position_type', '!=', 'paid-on-call'],
                ['position_type', '!=', 'contractor'],
            ])->orderBy('position_type', 'asc')->orderBy('state', 'asc')->get();

            if ( count($positions) > $per_page ) {
                $positions = Position::where([
                    ['position_type', '!=', 'full-time'],
                    ['position_type', '!=', 'paid-on-call'],
                    ['position_type', '!=', 'contractor'],
                ])->orderBy('state', 'asc')->orderBy('position_type', 'asc')->paginate($per_page);
            }
        }

        return view('positions', compact('positions', 'departments'));
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
