<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;


class RecipiceController extends Controller
{
    public function htmlView($uuid) {
        PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a4",
            "dpi" => 300
        ]);
        $logo = public_path('assets/logos/armoirie-burkina-faso.png');
        $demande = Demande::where('uuid', $uuid)->first();
        $parametre = Parametre::first();
        $logos = base64_encode(file_get_contents($logo));
        // return view('front-office.partials.recipice', compact('demande'));
        $pdf = PDF::loadView('front-office.partials.recipice', compact('demande', 'parametre', 'logos'));
        return $pdf->stream();
        // $nameFile = '';
        // $path = "recepisses/$nameFile.pdf";
        // Storage::put("public/$path", $pdf->output());
        
           
    }
  
   

}
