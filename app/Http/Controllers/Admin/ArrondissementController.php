<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Province;
use Illuminate\Http\Request;

class ArrondissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-office.pages.arrondissements.index',[
            'arrondissements'=>Arrondissement::orderBy('libelle', 'asc')->get(),
            // 'regions'=>Region::orderBy('libelle', 'asc')->get(),
            'communes'=> Commune::orderBy('libelle', 'asc')->get(),
            'arrondissement'=> new Arrondissement
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
        $commune = Commune::where('uuid', $request->commune_id)->first();
        if ($commune->statut == true) {
            Arrondissement::create([
                'libelle'=>$request->libelle,
                'commune_id'=>$request->commune_id,
            ]);
        return redirect()->route('arrondissements')->with('success', 'Arrondissement créée avec success');

        } else {
            return redirect()->route('arrondissements')->with('danger', 'Cette commune n\'a pas d\'arrondissement');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('back-office.pages.arrondissements.index',[
            'arrondissements'=>Arrondissement::orderBy('libelle', 'asc')->get(),
            // 'regions'=>Region::orderBy('libelle', 'asc')->get(),
            'communes'=> Commune::orderBy('libelle', 'asc')->get(),
            'arrondissement'=>  Arrondissement::where('uuid', $uuid)->first()
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
        $commune = Commune::where('uuid', $request->commune_id)->first();
        if ($commune->statut == true) {
            Arrondissement::where('uuid', $uuid)->first()->update([
                'libelle'=>$request->libelle,
                'commune_id'=>$request->commune_id,
            ]);
        return redirect()->route('arrondissements')->with('success', 'Arrondissement Modifié avec success');

        } else {
            return redirect()->route('arrondissements')->with('danger', 'Cette commune n\'a pas d\'arrondissement');

        }
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
