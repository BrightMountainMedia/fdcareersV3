<?php

namespace App\Http\Controllers\Kiosk;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Position;
use App\Department;
use App\Http\Controllers\Controller;

class MetricsController extends Controller
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
     * Get the department count for the application.
     *
     * @return Response
     */
    public function departments()
    {
        return Department::count();
    }

    /**
     * Get the position count for the application.
     *
     * @return Response
     */
    public function positions()
    {
        return Position::count();
    }

    /**
     * Get the user count for the application.
     *
     * @return Response
     */
    public function users()
    {
        return User::count();
    }

    /**
     * Get the subscriber count for the application.
     *
     * @return Response
     */
    public function subscribers()
    {
        return DB::table('subscriptions')->whereNull('ends_at')->orWhere('ends_at', '>=', Carbon::now())->count();
    }
}
