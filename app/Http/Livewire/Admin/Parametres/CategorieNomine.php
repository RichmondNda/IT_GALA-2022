<?php

namespace App\Http\Livewire\Admin\Parametres;

use App\Models\Gala;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;

class CategorieNomine extends Component
{
    use WithPagination;

    public $libelle = "";
    public $nbMax = "";
    public $promotion = 0 ;

    


    public function render()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        return view('livewire.admin.parametres.categorie-nomine',
            [
                'categories' => Categorie::where('gala_id', $gala->id)
                                        ->orderBy('created_at', 'DESC')->paginate(6),
            
            ]
        );
    }

    public function resetInput()
    {
       
        $this->libelle = "";
        $this->nbMax = "";
        
    }


    public function createTypeTicket()
    {
        $this->validate([
            'libelle' => 'required',
            'promotion' => 'required',
            'nbMax' => 'required'
        ]);

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        Categorie::create([
            'libelle' => $this->libelle,
            'nbMax' => $this->nbMax,
            'indicePromotion' => $this->promotion,
            'gala_id' => $gala->id
        ]);

        $this->resetInput();
    }

    public function deleteCat(int $id)
    {
        if($id)
        {
            $categorie = Categorie::where('id',$id)->first() ;
            $categorie->delete() ;

        }
    }

}
