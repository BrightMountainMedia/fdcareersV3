<?php

namespace App\Http\Controllers\Settings\Position;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Position;
use App\Department;
use App\Http\Controllers\Controller;
use App\Notifications\PositionPublished;
use App\Http\Requests\Position\AddPositionRequest;
use App\Http\Requests\Position\UpdatePositionRequest;

class SettingsPositionController extends Controller
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
     * Get all positions within department.
     *
     * @return Response
     */
    public function allDepartmentPositions($id)
    {
        $positions = Position::where('departmentId', $id)->get();
        
        return response()->json(['positions' => $positions]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($per_page = 10)
    {
        //
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
     * @param  \App\Http\Requests\Position\AddPositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPositionRequest $request)
    {
        $positionId = Position::insertGetId([
            'department_id' => $request->department_id, 
            'title' => $request->title, 
            'position_type' => $request->position_type, 
            'state' => $request->state, 
            'ending' => $request->ending, 
            'duedate' => $request->duedate, 
            'application_details' => $request->application_details, 
            'qualifications_to_apply' => $request->qualifications_to_apply, 
            'applications_available_start' => $request->applications_available_start, 
            'applications_available_end' => $request->applications_available_end, 
            'residency_requirements' => $request->residency_requirements, 
            'where_to_get_apps_label' => $request->where_to_get_apps_label, 
            'where_to_get_apps_address1' => $request->where_to_get_apps_address1, 
            'where_to_get_apps_address2' => $request->where_to_get_apps_address2, 
            'where_to_get_apps_city' => $request->where_to_get_apps_city, 
            'where_to_get_apps_state' => $request->where_to_get_apps_state, 
            'where_to_get_apps_zip' => $request->where_to_get_apps_zip, 
            'where_to_return_apps_label' => $request->where_to_return_apps_label, 
            'where_to_return_apps_address1' => $request->where_to_return_apps_address1, 
            'where_to_return_apps_address2' => $request->where_to_return_apps_address2, 
            'where_to_return_apps_city' => $request->where_to_return_apps_city, 
            'where_to_return_apps_state' => $request->where_to_return_apps_state, 
            'where_to_return_apps_zip' => $request->where_to_return_apps_zip, 
            'orientation_details' => $request->orientation_details, 
            'orientation_label' => $request->orientation_label, 
            'orientation_address1' => $request->orientation_address1, 
            'orientation_address2' => $request->orientation_address2, 
            'orientation_city' => $request->orientation_city, 
            'orientation_state' => $request->orientation_state, 
            'orientation_zip' => $request->orientation_zip, 
            'written_exam_details' => $request->written_exam_details, 
            'written_exam_label' => $request->written_exam_label, 
            'written_exam_address1' => $request->written_exam_address1, 
            'written_exam_address2' => $request->written_exam_address2, 
            'written_exam_city' => $request->written_exam_city, 
            'written_exam_state' => $request->written_exam_state, 
            'written_exam_zip' => $request->written_exam_zip, 
            'physical_details' => $request->physical_details, 
            'physical_label' => $request->physical_label, 
            'physical_address1' => $request->physical_address1, 
            'physical_address2' => $request->physical_address2, 
            'physical_city' => $request->physical_city, 
            'physical_state' => $request->physical_state, 
            'physical_zip' => $request->physical_zip, 
            'doc1_title' => $request->doc1_title, 
            'doc1_url' => $request->doc1_url, 
            'doc2_title' => $request->doc1_title, 
            'doc2_url' => $request->doc1_url, 
            'doc3_title' => $request->doc1_title, 
            'doc3_url' => $request->doc1_url, 
            'doc4_title' => $request->doc1_title, 
            'doc4_url' => $request->doc1_url, 
            'doc5_title' => $request->doc1_title, 
            'doc5_url' => $request->doc1_url, 
            'doc6_title' => $request->doc1_title, 
            'doc6_url' => $request->doc1_url, 
            'featured' => $request->featured, 
            'active' => 1,
            'publish' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $position = Position::find($positionId);

        return response()->json(['position' => $position]);

        // $position = Position::find($positionId);
        // $department = Department::find($position->department_id);
        // $users = User::where('notification_states', 'like', '%'.$request->state.'%')->get();
        // Notification::send($users, new PositionPublished($position, $department));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::where('id', $id)->first();
        $department = Department::where('id', $position->department_id)->first();
        $user = Auth::user();

        if ($department->owner_id === $user->id) {
            return response()->json(['position' => $position, 'department' => $department]);
        }

        return response()->json(['error' => 'You are unauthorized to modify this position. Please contact your department head if you believe this to be an error.']);
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
     * @param  \App\Http\Requests\Position\UpdatePositionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionRequest $request, $id)
    {
        Position::where('id', $id)
            ->update([
                'title' => $request->title, 
                'position_type' => $request->position_type, 
                'state' => $request->state, 
                'ending' => $request->ending, 
                'duedate' => $request->duedate, 
                'application_details' => $request->application_details, 
                'qualifications_to_apply' => $request->qualifications_to_apply, 
                'applications_available_start' => $request->applications_available_start, 
                'applications_available_end' => $request->applications_available_end, 
                'residency_requirements' => $request->residency_requirements, 
                'where_to_get_apps_label' => $request->where_to_get_apps_label, 
                'where_to_get_apps_address1' => $request->where_to_get_apps_address1, 
                'where_to_get_apps_address2' => $request->where_to_get_apps_address2, 
                'where_to_get_apps_city' => $request->where_to_get_apps_city, 
                'where_to_get_apps_state' => $request->where_to_get_apps_state, 
                'where_to_get_apps_zip' => $request->where_to_get_apps_zip, 
                'where_to_return_apps_label' => $request->where_to_return_apps_label, 
                'where_to_return_apps_address1' => $request->where_to_return_apps_address1, 
                'where_to_return_apps_address2' => $request->where_to_return_apps_address2, 
                'where_to_return_apps_city' => $request->where_to_return_apps_city, 
                'where_to_return_apps_state' => $request->where_to_return_apps_state, 
                'where_to_return_apps_zip' => $request->where_to_return_apps_zip, 
                'orientation_details' => $request->orientation_details, 
                'orientation_label' => $request->orientation_label, 
                'orientation_address1' => $request->orientation_address1, 
                'orientation_address2' => $request->orientation_address2, 
                'orientation_city' => $request->orientation_city, 
                'orientation_state' => $request->orientation_state, 
                'orientation_zip' => $request->orientation_zip, 
                'written_exam_details' => $request->written_exam_details, 
                'written_exam_label' => $request->written_exam_label, 
                'written_exam_address1' => $request->written_exam_address1, 
                'written_exam_address2' => $request->written_exam_address2, 
                'written_exam_city' => $request->written_exam_city, 
                'written_exam_state' => $request->written_exam_state, 
                'written_exam_zip' => $request->written_exam_zip, 
                'physical_details' => $request->physical_details, 
                'physical_label' => $request->physical_label, 
                'physical_address1' => $request->physical_address1, 
                'physical_address2' => $request->physical_address2, 
                'physical_city' => $request->physical_city, 
                'physical_state' => $request->physical_state, 
                'physical_zip' => $request->physical_zip, 
                'doc1_title' => $request->doc1_title, 
                'doc1_url' => $request->doc1_url, 
                'doc2_title' => $request->doc1_title, 
                'doc2_url' => $request->doc1_url, 
                'doc3_title' => $request->doc1_title, 
                'doc3_url' => $request->doc1_url, 
                'doc4_title' => $request->doc1_title, 
                'doc4_url' => $request->doc1_url, 
                'doc5_title' => $request->doc1_title, 
                'doc5_url' => $request->doc1_url, 
                'doc6_title' => $request->doc1_title, 
                'doc6_url' => $request->doc1_url, 
                'featured' => $request->featured, 
                'active' => $request->active,
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
