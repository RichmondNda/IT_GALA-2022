<?php

namespace App\Http\Livewire\Admin\Parametres;

use App\Models\Gala;
use App\Models\TypeTicket as ModelsTypeTicket;
use Livewire\Component;
use Livewire\WithPagination;

class TypeTicket extends Component
{
    use WithPagination;

    public $libelle = "";
    public $prix = "";


    public function render()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        return view('livewire.admin.parametres.type-ticket',
        [
            'typeTickets' => ModelsTypeTicket::where('gala_id', $gala->id)
                                    ->orderBy('created_at', 'DESC')->paginate(4),
        ]);
    }

    public function resetInput()
    {
       
        $this->libelle = "";
        $this->prix = "";
        
    }

    public function createTypeTicket()
    {
        $this->validate([
            'libelle' => 'required',
            'prix' => 'required|min:4'
        ]);

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        ModelsTypeTicket::create([
            'libelle' => $this->libelle,
            'prix' => $this->prix,
            'gala_id' => $gala->id
        ]);

        $this->resetInput();
    }

}
