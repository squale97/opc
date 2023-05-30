<?php

namespace App\Http\Livewire;

use App\Models\EcoleRegion;
use App\Models\EcoleUser;
use App\Models\Region;
use Livewire\Component;

class ListeAutoecole extends Component
{
    public $ecoles;
    public $ecolesSelectionnee =[];
    public $allEcoles =[];
    public $regions;
   // public bool $isSelect= false;
    public $transfere_region_id ; 
    protected $rules =[
        'transfere_region_id'=>'required',
    ];
    public function render()
    {
        return view('livewire.liste-autoecole');
    }

    public function mount() {
        $this->ecoles = EcoleUser::orderBy('created_at', 'desc')->get();
        $this->regions = Region::orderBy('libelle', 'asc')->get();
          

    }

     public function updatedEcolesSelectionnee()
    {
       if ($this->ecolesSelectionnee) {
          $this->isSelect = true;
       } else {
        $this->isSelect = false;

       }
       
    }
    public function updatedAllEcoles($value)
    {
        
        if ($value) {
            
           $this->ecolesSelectionnee =EcoleUser::all()->pluck('uuid');
           
            if ($this->ecolesSelectionnee->count()>0) {
                $this->isSelect = true;
                } else {
                $this->isSelect = false;
        
                }
            } else {

                $this->ecolesSelectionnee = [];
                $this->isSelect = false;
                
        }
        
    }

    public function submit()
    {
        $this->validate();
        $ecoles = EcoleUser::whereIn('uuid', $this->ecolesSelectionnee)->get();
       
        $ecoleregion = new EcoleRegion();
        if ($ecoles->count()>0) {
            foreach ($ecoles as  $ecole) {
               
                $ecoleregion->create([
                    'ecole_id'=> $ecole->uuid,
                    'region_id'=>$this->transfere_region_id,
                    ]);
            
                }
               
        }
        return  redirect()->route('autoecoles')->with('success', 'ecole a été affecté avec success');
    }
}
