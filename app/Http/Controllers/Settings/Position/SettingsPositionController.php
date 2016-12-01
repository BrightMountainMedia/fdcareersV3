<?php

namespace App\Http\Controllers\Settings\Position;

use Carbon\Carbon;
use Laravel\Spark\Spark;
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
        $positions = Position::where('departmentId', $id)->active()->get();
        
        return response()->json(['positions' => $positions]);
    }

    /**
     * Get all positions within department that are inactive.
     *
     * @return Response
     */
    public function allDepartmentScheduledPositions($id)
    {
        $positions = Position::where(['departmentId', $id])->scheduled()->inActive()->get();
        
        return response()->json(['positions' => $positions]);
    }

    /**
     * Get all positions within department that are inactive.
     *
     * @return Response
     */
    public function allInActiveDepartmentPositions($id)
    {
        $positions = Position::where(['departmentId', $id])->inActive()->get();
        
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
        $position = new Position;

        $position->department_id = $request->department_id;
        $position->title = $request->title;
        $position->salary = $request->salary;
        $position->position_type = $request->position_type;
        $position->state = $request->state;
        $position->application_details = $request->application_details;
        $position->testing_details = $request->testing_details;
        $position->orientation_details = $request->orientation_details;
        $position->requirements = $request->requirements;
        $position->qualifications = $request->qualifications;
        $position->residency_requirements = $request->residency_requirements;

        if ( strlen($request->video) > 28 ) {
            $video = explode('/', $request->video);
            $video = explode('"', $video[4]);
            $position->video = $video[0];
        } else if ( strlen($request->video) > 11 && strlen($request->video) <= 28 ) {
            $video = explode('/', $request->video);
            $video = end($video);
            $position->video = $video;
        } else {
            $position->video = $request->video;
        }

        $position->apply_link = $request->apply_link;
        $position->ending = $request->ending;
        $position->duedate = $request->duedate;
        $position->applications_available_start = $request->applications_available_start;
        $position->applications_available_end = $request->applications_available_end;
        $position->created_at = Carbon::now();
        $position->updated_at = Carbon::now();

        if ( $request->featured == 1 ) {
            $count = FeaturedPosition::count();
            if ( $count < 10 ) {
                FeaturedPosition::insert([
                    'position_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $position->featured = 1;
            } else if ( $count == 10 ) {
                $oldest = FeaturedPosition::active()->orderBy('created_at', 'ASC')->first();
                $pos = Position::find($oldest->position_id);
                $pos->featured = 0;
                $pos->save();
                $oldest->delete();
                FeaturedPosition::insert([
                    'position_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $position->featured = 1;
            }
        }

        if ($request->scheduled) {
            $month = $request->publishmonth;
            $day = strlen($request->publishday) == 1 ? '0'.$request->publishday : $request->publishday;
            $year = $request->publishyear;
            $hour = strlen($request->publishhour) == 1 ? '0'.$request->publishhour : $request->publishhour;
            $minute = strlen($request->publishminute) == 1 ? '0'.$request->publishminute : $request->publishminute;

            $position->publish = Carbon::setDateTime($year, $month, $day, $hour, $minute);
            $position->active = 0;
        } else {
            $position->publish = Carbon::now();
            $position->active = 1;
        }

        $position->save();

        if ( $position->active ) {
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

        if ( in_array($user->email, Spark::$developers) || $department->owner_id === $user->id) {
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
        $position = Position::find($id);

        $position->title = $request->title;
        $position->salary = $request->salary;
        $position->position_type = $request->position_type;
        $position->state = $request->state;

        if ( $request->publishmonth && $request->publishday && $request->publishyear && $request->publishday && $request->publishhour && $request->publishminute ) {
            $position->publish = $request->publishyear.'-'.$request->publishmonth.'-'.$request->publishday.' '.$request->publishhour.':'.$request->publishminute.':00';
        }

        $position->application_details = $request->application_details;
        $position->testing_details = $request->testing_details;
        $position->orientation_details = $request->orientation_details;
        $position->requirements = $request->requirements;
        $position->qualifications = $request->qualifications;
        $position->residency_requirements = $request->residency_requirements;

        if ( strlen($request->video) > 28 ) {
            $video = explode('/', $request->video);
            $video = explode('"', $video[4]);
            $position->video = $video[0];
        } else if ( strlen($request->video) > 11 && strlen($request->video) <= 28 ) {
            $video = explode('/', $request->video);
            $video = end($video);
            $position->video = $video;
        } else {
            $position->video = $request->video;
        }

        $position->apply_link = $request->apply_link;
        $position->ending = $request->ending;
        $position->duedate = $request->duedate;
        $position->applications_available_start = $request->applications_available_start;
        $position->applications_available_end = $request->applications_available_end;
        $position->updated_at = Carbon::now();

        if ( $request->featured == 1 ) {
            $count = FeaturedPosition::count();
            if ( $count < 10 ) {
                FeaturedPosition::insert([
                    'position_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $position->featured = 1;
            } else if ( $count == 10 ) {
                $oldest = FeaturedPosition::active()->orderBy('created_at', 'ASC')->first();
                $oldest->delete();
                FeaturedPosition::insert([
                    'position_id' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $position->featured = 0;
            }
        }

        if ( $request->active == 1 && $position->publish > Carbon::now() ) {
            $position->publish = Carbon::now();
            $position->active = 1;
        } else {
            $position->active = $request->active;
        }
        
        $position->save();
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
