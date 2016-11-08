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
use App\FeaturedPosition;
use App\Http\Controllers\Controller;
use App\Notifications\PositionPublishedAPP;
use App\Notifications\PositionPublishedMail;
use App\Notifications\PositionPublishedSMS;
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
     * Get all positions within department that are active.
     *
     * @return Response
     */
    public function allDepartmentPositions($id)
    {
        $positions = Position::where([['departmentId', $id],['active', '1']])->get();
        
        return response()->json(['positions' => $positions]);
    }

    /**
     * Get all positions within department that are inactive.
     *
     * @return Response
     */
    public function allInActiveDepartmentPositions($id)
    {
        $positions = Position::where([['departmentId', $id],['active', '0']])->get();
        
        return response()->json(['positions' => $positions]);
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
        $publish = Carbon::now();

        $positionId = Position::insertGetId([
            'department_id' => $request->department_id, 
            'title' => $request->title, 
            'salary' => $request->salary,
            'position_type' => $request->position_type, 
            'state' => $request->state, 
            'application_details' => $request->application_details, 
            'testing_details' => $request->testing_details, 
            'orientation_details' => $request->orientation_details, 
            'requirements' => $request->requirements, 
            'qualifications' => $request->qualifications, 
            'residency_requirements' => $request->residency_requirements, 
            'video' => $request->video,
            'apply_link' => $request->apply_link,
            'ending' => $request->ending, 
            'duedate' => $request->duedate, 
            'applications_available_start' => $request->applications_available_start, 
            'applications_available_end' => $request->applications_available_end, 
            'publish' => $publish,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'featured' => $request->featured, 
            'active' => 1
        ]);

        $position = Position::find($positionId);
        $department = Department::find($position->department_id);
        $users = User::where('notification_states', 'like', '%'.$position->state.'%')->get();
        foreach ($users as $user) {
            if ( $user->subscribed() && $user->app_notification ) {
                $user->notify(new PositionPublishedAPP($position));
            }
            if ( $user->subscribed() && $user->email_notification ) {
                $user->notify(new PositionPublishedMail($user, $position, $department));
            }
            if ( $user->subscribed() && $user->sms_notification ) {
                $user->notify(new PositionPublishedSMS($position));
            }
        }

        return response()->json(['position' => $position]);
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
        if ( $request->featured == 1 ) {
            $count = FeaturedPosition::count();
            if ( $count < 10 ) {
                FeaturedPosition::insert([
                    'position_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            } else if ( $count == 10 ) {
                $oldest = FeaturedPosition::active()->orderBy('created_at', 'ASC')->first();
                $position = Position::find($oldest->position_id);
                $position->featured = 0;
                $position->save();
                $oldest->delete();
                FeaturedPosition::insert([
                    'position_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        Position::where('id', $id)
            ->update([
                'title' => $request->title, 
                'salary' => $request->salary,
                'position_type' => $request->position_type, 
                'state' => $request->state, 
                'application_details' => $request->application_details, 
                'testing_details' => $request->testing_details, 
                'orientation_details' => $request->orientation_details, 
                'requirements' => $request->requirements, 
                'qualifications' => $request->qualifications, 
                'residency_requirements' => $request->residency_requirements, 
                'video' => $request->video,
                'apply_link' => $request->apply_link,
                'ending' => $request->ending, 
                'duedate' => $request->duedate, 
                'applications_available_start' => $request->applications_available_start, 
                'applications_available_end' => $request->applications_available_end, 
                'updated_at' => Carbon::now(),
                'featured' => $request->featured, 
                'active' => $request->active
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
