<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Department;
use App\FeaturedPosition;
use App\Http\Request\Position\AddFeaturedPositionRequest;
use App\Http\Request\Position\UpdateFeaturedPositionRequest;

class FeaturedPositionController extends Controller
{
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
     * Get a random featured position.
     *
     * @return \Illuminate\Http\Response
     */
    public function example()
    {
        $featured_position = FeaturedPosition::active()->inRandomOrder()->first();
        $position = Position::find($featured_position->position_id);

        return response()->json(['position' => $position]);
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
    public function store(AddFeaturedPositionRequest $request)
    {
        $featuredPosition = new FeaturedPosition;
        $featuredPosition->position_id = $request->position_id;
        $featuredPosition->active = 1;
        $featuredPosition->save();

        $position = Position::find($request->position_id);
        $position->featured = 1;
        $position->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $featured = FeaturedPosition::where('position_id', $id)->active()->first();
        if ($featured) {
        	$position = Position::where('id', $featured->position_id)->first();
        	$department = Department::where('id', $position->department_id)->first();
            if ( $user ) {
                $saved = DB::table('positions_saved')->where('position_id', $position->id)->where('user_id', $user->id)->first();
                $applied = DB::table('positions_applied')->where('position_id', $position->id)->where('user_id', $user->id)->first();
                return view('pages.featured.featured-position', compact('position', 'department', 'saved', 'applied'));
            }
            
        	return view('pages.featured.featured-position', compact('position', 'department'));
        }

        if ( $user && $user->subscribed() ) {
        	return redirect('/position/'.$id)->with(['error' => 'The position you requested is not featured at this time.']);
        } elseif ( $user && ! $user->subscribed() ) {
        	return redirect('/settings#/subscription')->with(['error' => 'The position you requested is not featured at this time and also requires a subscription to view.']);
        }

        return redirect('/register')->with(['error' => 'The position you requested is not featured at this time and also requires a subscription to view.']);
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
    public function update(UpdateFeaturedPositionRequest $request, $id)
    {
        $unfeatured = $request->active == '0' ? Carbon::now() : NULL;

        $featuredPosition = FeaturedPosition::find($id);
        $featuredPosition->active = $request->active;
        $featuredPosition->unfeatured = $unfeatured;
        $featuredPosition->save();

        $position = Position::find($featuredPosition->position_id);
        $position->featured = $request->active;
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
