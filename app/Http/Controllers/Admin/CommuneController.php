<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-office.pages.communes.index',[
            'communes'=>Commune::orderBy('libelle', 'asc')->get(),
            // 'regions'=>Region::orderBy('libelle', 'asc')->get(),
            'provinces'=> Province::orderBy('libelle', 'asc')->get(),
            'commune'=> new Commune
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
            'libelle' => 'required|string|max:255|unique:communes',
            'province_id' => 'required',
           
        ]);
        $commune= new Commune;

        $commune->libelle = $request->libelle;
        $commune->province_id = $request->province_id;
        if (isset($request->statut)) {
            $commune->statut = $request->statut;
        }
        $commune->save();
        return redirect()->route('communes')->with('success', 'Commune créée avec success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('back-office.pages.communes.index',[
            'communes'=>Commune::orderBy('libelle', 'asc')->get(),
            'provinces'=> Province::orderBy('libelle', 'asc')->get(),
            'commune'=>  Commune::where('uuid', $uuid)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        
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
        $commune= Commune::where('uuid', $uuid)->first();

        $commune->libelle = $request->libelle;
        $commune->province_id = $request->province_id;
        if (isset($request->statut)) {
            $commune->statut = $request->statut;
        }
        $commune->save();
        
        return redirect()->route('communes')->with('success', 'Commune modifiée avec success');
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
