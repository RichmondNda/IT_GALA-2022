<?php

namespace App\Http\Livewire\Admin\Parametres;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gala as ModelsGala;

class Gala extends Component
{
    use WithPagination;

    
    public $pco_1 = "";
    public $pco_2 = "";
    public $annee;
    public $nb_place;

    public function render()
    {
        return view('livewire.admin.parametres.gala',
        [
            'galas' => ModelsGala::orderBy('created_at', 'DESC')
                                    ->paginate(4),
        ]);
    }


    public function resetInput()
    {
       
        $this->pco_1 = "";
        $this->pco_2 = "";
        $this->annee = "";
        $this->nb_place = 0 ;
        
    }

    public function createGala()
    {
        $this->validate([
            'pco_1' => 'required',
            'annee' => 'required|min:4',
            'nb_place' => 'required|integer'
        ]);

        ModelsGala::create([
            'nomPco1' => $this->pco_1,
            'nomPco2' => $this->pco_2,
            'annee' => $this->annee,
            'nbPlace' => $this->nb_place
        ]);

        $this->resetInput();
    }

    public function bloqueVote(int $id)
    {
        
        $gala = ModelsGala::find($id) ;
        $gala->status = ! $gala->status ;
        $gala->save() ;
    }

    

}
