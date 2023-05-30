<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Demande;
use App\Models\Admin;
use App\Models\EcoleRegion;
use App\Models\EcoleUser;

class DemandeTransfert extends Component
{
    public $demandesSelectionnee =[];
    public $allDemandes =[];
   // public bool $isSelect= false;
    public $transfere_autoecole_id ; 
    public $demandes;
    protected $rules =[
        'transfere_autoecole_id'=>'required',
    ];
    public function render()
    {
       
        if (Auth::user()->profile == 'admin') {
             return view('livewire.demande-transfert', 
            [
                'demandes'=>Demande::orderBy('created_at', 'desc')
                                    ->where('status_demande', '=', 'selectionne')
                                    ->where('transfere_autoecole_id', '=', null)
                                    ->orderBy('created_at', 'desc')
                                    ->get(),
                'titre'=>'Demandes selectionnées', 
                'break'=>'Demandes selectionnées',
                'ecoles'=> EcoleRegion::all()
            ]);
        }elseif (Auth::user()->profile == 'dr') {
             return view('livewire.demande-transfert', 
            [
                
                'demandes'=>Demande::where('region_id', Auth::user()->region_id)
                                    ->where('province_id', Auth::user()->province_id)
                                    ->where('transfere_autoecole_id', '=', null)
                                    ->where('status_demande', '=', 'selectionne')
                                    ->orderBy('created_at', 'desc')
                                    ->get(),
                'titre'=>'Demandes selectionnées', 
                'break'=>'Demandes selectionnées',
                'ecoles'=> EcoleRegion::where('region_id', Auth::user()->region_id)
                                    ->get()
            ]);
            
        }else {
           
             return view('livewire.demande-transfert', 
            [
                'demandes'=>Demande::where('province_id', Auth::user()->province_id)
                                    ->where('status_demande', '=', 'selectionne')
                                    ->where('transfere_autoecole_id', '=', null)
                                    ->orderBy('created_at', 'desc')
                                    ->get(),
                'titre'=>'Demandes selectionnées', 
                'break'=>'Demandes selectionnées',
                'ecoles'=> EcoleRegion::where('region_id', Auth::user()->region_id)->get()
            ]);
        }
        // return view('livewire.demande-transfert');
    }
    public function updatedDemandesSelectionnee()
    {
       if ($this->demandesSelectionnee) {
          $this->isSelect = true;
       } else {
        $this->isSelect = false;

       }
       
    }
    public function updatedAllDemandes($value)
    {
        
        if ($value) {
            
           $this->demandesSelectionnee =Demande::orderBy('created_at', 'desc')
                                        ->where('status_demande', '=', 'selectionne')
                                        ->where('status_paiement', '=', true)
                                        ->where('transfere_autoecole_id', '==', null)
                                        ->orderBy('created_at', 'desc')
                                        ->pluck('uuid');
           
            if ($this->demandesSelectionnee->count()>0) {
                $this->isSelect = true;
                } else {
                $this->isSelect = false;
        
                }
            } else {

                $this->demandesSelectionnee = [];
                $this->isSelect = false;
                
        }
        
    }
    public function submit()
    {
       
        $this->validate();
        $demandes = Demande::whereIn('uuid', $this->demandesSelectionnee)->get();
        
        if ($demandes->count()>0) {
            foreach ($demandes as  $demande) {
                if($demande->status_paiement == false){
                    return  redirect()->route('demande-selectionnee')->with('error', 'Demande en attente de paiement');
                }else{
                    $demande->update(
                        [
                            'transfere_autoecole_id'       => $this->transfere_autoecole_id,
                            'admin_transfere_autoecole_id' => Auth::user()->uuid,
                        ]);
                }
                }
               
        }
        return  redirect()->route('demande-selectionnee')->with('success', 'Le candidat a été affecté avec success');
    }
}
