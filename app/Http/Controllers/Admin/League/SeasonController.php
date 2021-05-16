<?php

namespace App\Http\Controllers\Admin\League;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;
use App\Models\Season;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasonsPerPage = 15;
        $seasons = Season::with('leagues')->paginate($seasonsPerPage);

        return view('admin.season.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues = League::all();
        return view('admin.season.create', compact('leagues'));
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
        try {
            $season = Season::create($data);
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect('admin/seasons/create')->with('message', 'Nazwa sezonu już istnieje!!');
            }
        }

        if (!empty($data['leagues']))
            $season->leagues()->attach($data['leagues']);

        return redirect('admin/seasons/')->with('message', 'Dodano nowy sezon');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = Season::findOrFail($id);
        $leagues = League::all();

        return view('admin.season.edit', compact('season', 'leagues'));
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
        $season = Season::findOrFail($id);
        try {
            $season->update($data);
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect('admin/seasons/' . $id . '/edit')->with('message', 'Nazwa sezonu już istnieje!!');
            }
        }
        isset($data['leagues']) ? $season->leagues()->sync($data['leagues']) : $season->leagues()->sync([]);

        return redirect('admin/seasons')->with('message', 'Edytowano Sezon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $season = Season::findOrFail($id);
        $season->delete();

        return redirect('admin/seasons')->with('message', 'Usunięto Sezon');
    }
}
