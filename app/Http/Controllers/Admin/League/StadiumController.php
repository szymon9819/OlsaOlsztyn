<?php

namespace App\Http\Controllers\Admin\League;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use App\Models\League;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadiumsPerPage = 15;
        $stadiums = Stadium::paginate($stadiumsPerPage);

        return view('admin.stadium.index', compact('stadiums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues= League::all();
        return view('admin.stadium.create',compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $stadium=Stadium::create($data);

        return redirect('admin/stadiums')->with('message', 'Dodano nową halę');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stadium = Stadium::findOrFail($id);
        $leagues= League::all();
        return view('admin.stadium.edit', compact('stadium','leagues'));
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
        $stadium = Stadium::findOrFail($id);
        $stadium->update($request->all());

        return redirect('admin/stadiums')->with('message', 'Edytowano adres hali');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stadium = Stadium::findOrFail($id);
        $stadium->delete();

        return redirect('admin/stadiums')->with('message', 'Usunięto halę');
    }
}
