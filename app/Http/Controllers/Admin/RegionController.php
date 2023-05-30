<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-office.pages.regions.index',['regions'=>Region::orderBy('libelle', 'asc')->get(), 'region'=>new Region]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function province()
    {
        return view('back-office.pages.provinces.index', [
            'provinces'=> Province::orderby('region_id', "asc")->get(),
            'regions'=>Region::orderBy('libelle', 'asc')->get(),
            'province'=> new Province
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Region::create([
            'libelle'=>$request->libelle,
        ]);
        return redirect()->route('regions')->with('success', 'Region créée avec success');

    }
    public function storeProvince(Request $request)
    {
         Province::create([
            'libelle'=>$request->libelle,
            'region_id'=>$request->region_id
        ]);
        return redirect()->route('provinces')->with('success', 'Province créée avec success');

    }
    public function updateProvince(Request $request, $uuid)
    {
        Province::where('uuid', $uuid)->first()->update([
            'libelle'=>$request->libelle,
            'region_id'=>$request->region_id
        ]);
        return redirect()->route('provinces')->with('succes', 'Region créée avec success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('back-office.pages.provinces.index', [
            'provinces'=> Province::orderby('region_id', "asc")->get(),
            'province'=> province::where('uuid', $uuid)->first(),
            'regions'=>Region::orderBy('libelle', 'asc')->get(),
            
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
        return view('back-office.pages.regions.index', [
            'region'=> Region::where('uuid', $uuid)->first(),
            'regions'=>Region::orderBy('libelle', 'asc')->get(),
            
        ]);
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
        Region::where('uuid', $uuid)->first()->update([
            'libelle'=>$request->libelle,
        ]);
        return redirect()->route('regions')->with('succes', 'Region créée avec success');
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
