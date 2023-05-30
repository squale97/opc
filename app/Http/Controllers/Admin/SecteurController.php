<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-office.pages.secteurs.index',[
            'secteurs'=>Secteur::orderBy('libelle', 'asc')->get(),
            'communes'=> Commune::orderBy('libelle', 'asc')->get(),
            'secteur'=> new Secteur
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
        Secteur::create([
            'libelle'=> $request->libelle,
            'commune_id'=> $request->commune_id,
        ]);
        return redirect()->route('secteurs')->with('success', 'Secteur créé avec success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('back-office.pages.secteurs.index',[
            'secteurs'=>Secteur::orderBy('libelle', 'asc')->get(),
            'communes'=> Commune::orderBy('libelle', 'asc')->get(),
            'secteur'=>  Secteur::where('uuid', $uuid)->first()
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
        Secteur::where('uuid', $uuid)->first()->update([
            'libelle'=> $request->libelle,
            'commune_id'=> $request->commune_id,
        ]);
        return redirect()->route('secteurs')->with('success', 'Secteur modifié avec success');

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
