<?php
namespace App\Http\Controllers\Admin;


use App\Models\Formation;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Niveau;
use App\Models\Diplome;

class FormationController extends Controller
{
    public function index()
    {
        return view('back-office.pages.formations.index',[
            'formations'=> Formation::all(),
            'formation'=> new Formation(),
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255|unique:formations',            
           
        ]);
        Formation::create($validatedData);
        return redirect()->route('formation')->with('success', 'Formation créée avec succès');
    }
    public function editFormation($uuid)
    {
        return view('back-office.pages.formations.index',[
            'formations'=> Formation::all(),
            'formation'=>  Formation::where('uuid', $uuid)->first(),
        ]);
    }

    public function updateFormation(Request $request, $uuid)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',            
           
        ]);
        Formation::where('uuid', $uuid)->first()->update($validatedData);
        return redirect()->route('edit-formation', $uuid)->with('success', 'Formation modifiée avec succès');
    }
    public function destroy($uuid)
    {
       
       if (Niveau::where('formation_id', $uuid)->get()->count() == 0) {
        Formation::where('uuid', $uuid)->first()->delete();
        return redirect()->route('formation')->with('success', 'Formation supprimée avec succès');
    } else {
           return redirect()->route('formation')->with('warning', 'Impossible de supprimer cette formation');
           # code...
       }
       
        
    }

    public function niveau()
    {
        return view('back-office.pages.formations.niveau',[
            'formations'=> Formation::all(),
            'niveaux'=> Niveau::all(),
            'niveau'=> new Niveau(),
        ]);
    }
    public function storeNiveau(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',            
            'formation_id' => 'required',     
        ]);

        Niveau::create($validatedData);
        return redirect()->route('niveau')->with('success', 'Niveau créé avec succès');
    }
    public function editNiveau($uuid)
    {
        return view('back-office.pages.formations.niveau',[
            'formations'=> Formation::all(),
            'niveaux'=> Niveau::all(),
            'niveau'=>  Niveau::where('uuid', $uuid)->first(),
        ]);
    }

    public function updateNiveau(Request $request, $uuid)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',  
            'formation_id'=> 'required'          
           
        ]);
        Niveau::where('uuid', $uuid)->first()->update($validatedData);
        return redirect()->route('edit-niveau', $uuid)->with('success', 'Niveau modifié avec succès');
    }
    public function destroyNiveau($uuid)
    {
       if (Diplome::where('niveau_id', $uuid)->get()->count() == 0) {
        Niveau::where('uuid', $uuid)->first()->delete();
        return redirect()->route('niveau')->with('success', 'Niveau supprimée avec succès');
    } else {
           return redirect()->route('niveau')->with('warning', 'Impossible de supprimer ce niveau');
           # code...
       }
       
        
    }
    

    public function diplome()
    {
        return view('back-office.pages.formations.diplome',[
            'diplomes'=> Diplome::all(),
            'niveaux'=> Niveau::all(),
            'diplome'=> new Diplome(),
        ]);
    }
    public function storeDiplome(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',            
            'niveau_id' => 'required',     
        ]);

        Diplome::create($validatedData);
        return redirect()->route('diplome')->with('success', 'Diplôme créé avec succès');
    }
    public function editDiplome($uuid)
    {
        return view('back-office.pages.formations.diplome',[
            'diplomes'=> Diplome::all(),
            'niveaux'=> Niveau::all(),
            'diplome'=>  Diplome::where('uuid', $uuid)->first(),
        ]);
    }

    public function updateDiplome(Request $request, $uuid)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',  
            'niveau_id'=> 'required'          
           
        ]);
        Diplome::where('uuid', $uuid)->first()->update($validatedData);
        return redirect()->route('edit-diplome', $uuid)->with('success', 'Diplôme modifié avec succès');
    }
    public function destroyDiplome($uuid)
    {
       
        Diplome::where('uuid', $uuid)->first()->delete();
        return redirect()->route('diplome')->with('success', 'Diplôme supprimée avec succès');
   
       
        
    }
}
