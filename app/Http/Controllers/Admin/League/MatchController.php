<?php

namespace App\Http\Controllers\Admin\League;

use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\MatchResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::paginate(20);

        return view('admin.match.index', compact('matches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::findOrFail($id);
        return view('admin.match.edit', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Match::findOrFail($id);
        $matchResult = $match->matchResult;
        $match->update(['match_day' => Carbon::parse($request->match_day)->format('Y-m-d'),
            'time' => $request->time]);

        if (!empty($matchResult) && !empty($request->home) && !empty($request->guest))
            $matchResult->update($request->all());
        else if (!empty($request->home) && !empty($request->guest)) {
            $matchResult = MatchResult::create([
                'home' => $request->home,
                'guest' => $request->guest,
                'match_id' => $match->id
            ]);
        }
        if (!empty($matchResult) && empty($request->home) && empty($request->guest)) {
            $matchResult->delete();
        }


        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::findOrFail($id);
        $match->delete();

        return redirect('admin/matches')->with('message', 'Usunięto mecz');
    }
}
