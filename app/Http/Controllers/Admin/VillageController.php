<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Commune;


class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-office.pages.villages.index',[
            'villages'=>Village::orderBy('libelle', 'asc')->get(),
            'communes'=> Commune::orderBy('libelle', 'asc')->get(),
            'village'=> new Village
        ]);
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
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'commune_id' => 'required',
           
        ]);
        Village::create([
            'libelle'=> $request->libelle,
            'commune_id'=> $request->commune_id,
        ]);
        return redirect()->route('villages')->with('success', 'Village créé avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('back-office.pages.villages.index',[
            'villages'=>Village::orderBy('libelle', 'asc')->get(),
            'communes'=> Commune::orderBy('libelle', 'asc')->get(),
            'village'=>  Village::where('uuid', $uuid)->first()
        ]);
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
    public function update(Request $request, $uuid)
    {
        Village::where('uuid', $uuid)->first()->update([
            'libelle'=> $request->libelle,
            'commune_id'=> $request->commune_id,
        ]);
        return redirect()->route('villages')->with('success', 'Village modifié avec success');
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
