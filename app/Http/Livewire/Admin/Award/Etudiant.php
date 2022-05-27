<?php

namespace App\Http\Livewire\Admin\Award;

use App\Models\Etudiant as ModelsEtudiant;
use App\Models\Gala;
use App\Models\Nomine;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Etudiant extends Component
{
    use WithPagination;

    public $nom = "" ;
    public $matricule = "" ;
    public $promotion ="" ;

    public function render()
    {
        return view('livewire.admin.award.etudiant', [
            'etudiants' => ModelsEtudiant::where(
                                    function($q){
                                        $q->where('nom', 'LIKE', "%{$this->nom}%")->orWhere('prenom', 'LIKE', "%{$this->nom}%") ;
                                        })
                                        ->Where('matricule', 'LIKE', "%{$this->matricule}%")
                                        ->Where('promotion', 'LIKE', "%{$this->promotion}%")
                                        ->paginate(8)
        ]);
    }


    
}
