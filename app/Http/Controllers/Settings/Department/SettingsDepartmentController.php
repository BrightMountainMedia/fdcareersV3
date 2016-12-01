<?php

namespace App\Http\Controllers\Settings\Department;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\AddDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;

class SettingsDepartmentController extends Controller
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
     * Get all departments with user as owner.
     *
     * @return Response
     */
    public function allUserDepartments($userId)
    {
        $departments = Department::where('owner_id', $userId)->get();

        return response()->json(['departments' => $departments]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get the departments based on the incoming search query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function performBasicSearch(Request $request)
    {
        $query = str_replace('*', '%', $request->input('query'));

        return $this->search($query);
    }

    /**
     * Perform the search.
     *
     * @param  string  $query
     * @return \Illuminate\Http\Response
     */
    public function search($query)
    {
        $search = DB::table('departments');

        return $search->where(function ($search) use ($query) {
            $search->where('name', 'like', $query)
                   ->orWhere('email', 'like', $query)
                   ->orWhere('hq_city', 'like', $query)
                   ->orWhere('hq_state', 'like', $query);
        })->get();
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
     * @param  \App\Http\Requests\Department\AddDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddDepartmentRequest $request)
    {
        $departmentId = Department::insertGetId([
            'owner_id' => $request->owner_id, 
            'email' => $request->email, 
            'photo_url' => $request->photo_url, 
            'fdid' => $request->fdid, 
            'name' => $request->name, 
            'hq_address1' => $request->address1, 
            'hq_address2' => $request->address2, 
            'hq_city' => $request->city, 
            'hq_state' => $request->state, 
            'hq_zip' => $request->zip, 
            'mail_address1' => $request->mail_address1, 
            'mail_address2' => $request->mail_address2, 
            'mail_po_box' => $request->mail_po_box, 
            'mail_city' => $request->mail_city, 
            'mail_state' => $request->mail_state, 
            'mail_zip' => $request->mail_zip, 
            'hq_phone' => $request->phone, 
            'hq_fax' => $request->fax, 
            'county' => $request->county, 
            'dept_type' => $request->dept_type, 
            'org_type' => $request->org_type, 
            'website' => $request->website, 
            'stations' => $request->stations, 
            'active_ff_career' => $request->active_ff_career, 
            'active_ff_volunteer' => $request->active_ff_volunteer, 
            'active_ff_paid_per_call' => $request->active_ff_paid_per_call, 
            'non_ff_civilian' => $request->non_ff_civilian, 
            'non_ff_volunteer' => $request->non_ff_volunteer, 
            'primary_agency_for_em' => $request->primary_agency_for_em, 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);

        $department = Department::find($departmentId);

        return response()->json(['department' => $department]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::where('id', $id)->first();
        $user = Auth::user();

        if ($department->owner_id === $user->id) {
            $positions = Position::where('department_id', $id)->published()->active()->get();
            $scheduled = Position::where('department_id', $id)->scheduled()->orderBy('publish', 'ASC')->get();
            $inactive = Position::where('department_id', $id)->published()->inActive()->get();

            if ( $department->oldId ) {
                $positions = Position::where('department_id', $department->oldId)->published()->active()->get();
                $scheduled = Position::where('department_id', $department->oldId)->scheduled()->orderBy('publish', 'ASC')->get();
                $inactive = Position::where('department_id', $department->oldId)->published()->inActive()->get();
            }

            return response()->json(['department' => $department, 'positions' => $positions, 'scheduled' => $scheduled, 'inactive' => $inactive]);
        }

        if ( in_array($user->email, Spark::$developers) ) {
            $positions = Position::where('department_id', $id)->published()->active()->get();
            $scheduled = Position::where('department_id', $id)->scheduled()->orderBy('publish', 'ASC')->get();
            $inactive = Position::where('department_id', $id)->published()->inActive()->get();

            if ( $department->oldId ) {
                $positions = Position::where('department_id', $department->oldId)->published()->active()->get();
                $scheduled = Position::where('department_id', $department->oldId)->scheduled()->orderBy('publish', 'ASC')->get();
                $inactive = Position::where('department_id', $department->oldId)->published()->inActive()->get();
            }
        }

        return response()->json(['error' => 'You are unauthorized to modify this department. Please contact your department head if you believe this to be an error.']);
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
     * @param  \App\Http\Requests\Department\UpdateDepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        Department::where('id', $id)
            ->update([
                'email' => $request->email, 
                'fdid' => $request->fdid, 
                'name' => $request->name, 
                'hq_address1' => $request->hq_address1, 
                'hq_address2' => $request->hq_address2, 
                'hq_city' => $request->hq_city, 
                'hq_state' => $request->hq_state, 
                'hq_zip' => $request->hq_zip, 
                'mail_address1' => $request->mail_address1, 
                'mail_address2' => $request->mail_address2, 
                'mail_po_box' => $request->mail_po_box, 
                'mail_city' => $request->mail_city, 
                'mail_state' => $request->mail_state, 
                'mail_zip' => $request->mail_zip, 
                'hq_phone' => $request->hq_phone, 
                'hq_fax' => $request->hq_fax, 
                'county' => $request->county, 
                'dept_type' => $request->dept_type, 
                'org_type' => $request->org_type, 
                'website' => $request->website, 
                'stations' => $request->stations, 
                'active_ff_career' => $request->active_ff_career, 
                'active_ff_volunteer' => $request->active_ff_volunteer, 
                'active_ff_paid_per_call' => $request->active_ff_paid_per_call, 
                'non_ff_civilian' => $request->non_ff_civilian, 
                'non_ff_volunteer' => $request->non_ff_volunteer, 
                'primary_agency_for_em' => $request->primary_agency_for_em, 
                'updated_at' => Carbon::now()
            ]);
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
