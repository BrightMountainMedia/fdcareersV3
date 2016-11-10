<?php

namespace App\Http\Controllers\Pages;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Department;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($per_page = 10)
    {
        $departments = Department::get();
        if ( count($departments) > $per_page ) {
            $departments = Department::paginate($per_page);
        }
        $user = Auth::user();
        if ($user && $user->subscribed()) {
            $positions = Position::select('id', 'department_id', 'title', 'position_type')->published()->active()->get();
        } else {
            $positions = Position::select('id', 'department_id', 'title', 'position_type')->where([
                ['position_type', '!=', 'full-time'],
                ['position_type', '!=', 'paid-on-call'],
                ['position_type', '!=', 'contractor'],
            ])->published()->active()->get();
        }

        return view('pages.department.departments', compact('departments', 'positions'));
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
        $department = Department::find($id);
        $user = Auth::user();

        if ($user && $user->subscribed()) {
            $paidPositions = Position::select('id', 'department_id', 'title', 'position_type')
                                     ->where([['department_id', $id],['position_type', 'full-time'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->orWhere([['department_id', $id],['position_type', 'paid-on-call'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->orWhere([['department_id', $id],['position_type', 'contractor'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->get();

            $unpaidPositions = Position::select('id', 'department_id', 'title', 'position_type')
                                     ->where([['department_id', $id],['position_type', 'part-time'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->orWhere([['department_id', $id],['position_type', 'volunteer'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->get();
        } else {
            $unpaidPositions = Position::select('id', 'department_id', 'title', 'position_type')
                                     ->where([['department_id', $id],['position_type', 'part-time'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->orWhere([['department_id', $id],['position_type', 'volunteer'],['publish', '<=', Carbon::now()],['active', '1']])
                                     ->get();
        }

        return view('pages.department.department', compact('department', 'paidPositions', 'unpaidPositions'));
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
