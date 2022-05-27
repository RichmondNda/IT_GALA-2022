<?php

namespace App\Http\Livewire\Admin\Award;

use App\Models\Gala;
use App\Models\Nomine;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;

class Liste extends Component
{
    use WithPagination;

    public $nom = "" ;
    public $matricule = "" ;
    public $categorie ="" ;

    
    public function render()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        return view('livewire.admin.award.liste', [

            'categories' => Categorie::where('gala_id', $gala->id )->get(),
            'nomines' => Nomine::Where('categorie_id', 'LIKE', "%{$this->categorie}%")->paginate(8)
                    //Where('promotion', 'LIKE', "%{$this->promotion}%")
                    // where(
                    //     function($q){
                    //         $q->where('nom', 'LIKE', "%{$this->nom}%")->orWhere('prenom', 'LIKE', "%{$this->nom}%") ;
                    //         })
                    //         ->Where('matricule', 'LIKE', "%{$this->matricule}%")
                            
        ]);
    }

    public function SupprimerNominer(int $id)
    {
        $nomine = Nomine::find($id);

        if($nomine)
        {
            $nomine->delete() ;
        }
    }
}
