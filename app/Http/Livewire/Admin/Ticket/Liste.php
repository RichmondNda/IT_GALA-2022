<?php

namespace App\Http\Livewire\Admin\Ticket;

use App\Models\Personne;
use Livewire\Component;
use Livewire\WithPagination;

class Liste extends Component
{
    use WithPagination;
    public $matricule ='' ;
    public $nom = '' ;

    public function render()
    {
        return view('livewire.admin.ticket.liste', [
            'personnes' => Personne::where(
                                function($q){
                                    $q->where('nom', 'LIKE', "%{$this->nom}%")
                                    ->orWhere('prenom', 'LIKE', "%{$this->nom}%")
                                    ->Where('matricule', 'LIKE', "%{$this->matricule}%") ;
                                    })
                                    
                    ->orderBy('created_at', 'DESC')
                    ->paginate(8)
        ]);
    }
}
