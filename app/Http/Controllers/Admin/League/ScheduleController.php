<?php

namespace App\Http\Controllers\Admin\League;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Models\Team;
use App\Services\LeagueSheduleService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues = League::all();

        return view('admin.schedule.create', compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $league = League::findOrFail($request->league);
        $season = $league->seasons->last();
        $teams = $league->teams->toArray();

        $matches = LeagueSheduleService::generateSchedule($teams, $season, $request->match_day, $request->time);


        return view('admin.schedule.show', compact('matches'));
    }


}
