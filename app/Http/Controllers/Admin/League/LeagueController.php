<?php

namespace App\Http\Controllers\Admin\League;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Models\Stadium;
use Illuminate\Http\Request;


class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagusPerPage = 15;
        $leagues = League::paginate($leagusPerPage);
        return view('admin.league.index', compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stadiums = Stadium::emptyLeague();
        $seasons = Season::all();

        return view('admin.league.create', compact('stadiums', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $league = League::create($data);
        if (!empty($data['seasons']))
            $league->seasons()->attach($data['seasons']);

        if (array_key_exists('stadiums', $data))
            Stadium::addLeagueAssociation($data['stadiums'], $league);

        return redirect('admin/leagues')->with('message', 'Dodano nową ligę');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $league = League::findOrFail($id);
        $stadiums = Stadium::emptyAndWithLeague($league);
        $seasons = Season::all();

        return view('admin.league.edit', compact('league', 'stadiums', 'seasons'));
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
        $data = $request->all();
        $league = League::findOrFail($id);
        $league->update($data);
        isset($data['seasons']) ? $league->seasons()->sync($data['seasons']) : $league->seasons()->sync([]);
        if (array_key_exists('stadiums', $data))
            Stadium::updateLeagueAssociation($data['stadiums'], $league);

        return redirect('admin/leagues')->with('message', 'Edytowano Ligę');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $league = League::findOrFail($id);
        $league->delete();

        return redirect('admin/leagues')->with('message', 'Usunięto Ligę');
    }
}
