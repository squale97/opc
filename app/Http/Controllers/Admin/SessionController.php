<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-office.pages.session.index',[
            'sessions'=>Session::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-office.pages.session.create',[
            'sessions'=>Session::orderBy('created_at', 'desc')->get(),
            'session'=>new Session,
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
        $request->validate([
            'titre' => 'required|string|max:255',
            'nombre_candidat' => 'required',
            'date_ouverture' => 'required',
            'date_fermeture' => 'required',
            'condition' => 'required',
                        
        ]);

        Session::create([
            'titre' => $request->titre,
            'nombre_candidat' => $request->nombre_candidat,
            'date_ouverture' => $request->date_ouverture,
            'date_fermeture' => $request->date_fermeture,
            'condition' => $request->condition,
        ]);
        return redirect()->route('session')->with('success', 'Session créée avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
       
        return view('back-office.pages.session.show',[
            'session' => Session::where('uuid', $uuid)->first(),
            'sessions'=>Session::orderBy('created_at', 'desc')->get()
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
        return view('back-office.pages.session.create',[
            'sessions'=>Session::orderBy('created_at', 'desc')->get(),
            'session'=>Session::where('uuid', $uuid)->first(),
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
        Session::where('uuid', $uuid)->update([
            'titre' => $request->titre,
            'nombre_candidat' => $request->nombre_candidat,
            'date_ouverture' => $request->date_ouverture,
            'date_fermeture' => $request->date_fermeture,
            'condition' => $request->condition,
        ]);
        return redirect()->route('edit-session', $uuid)->with('success', 'Session Modifiée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        if (Demande::where('session_id', $uuid)->get()->count() ==0) {
            Session::where('uuid', $uuid)->first()->delete();
            return redirect()->route('session')->with('success', 'Session supprimée avec succes');
        } else {
                return redirect()->route('session')->with('danger', 'Impossible de supprimer ce enregistrement');
                # code...
            }
        

    }
}
