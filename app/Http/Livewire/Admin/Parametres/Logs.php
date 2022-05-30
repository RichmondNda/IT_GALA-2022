<?php

namespace App\Http\Livewire\Admin\Parametres;

use Livewire\Component;

class Logs extends Component
{
    public function render()
    {
        return view('livewire.admin.parametres.logs',[
            'logs' => Logs::orderBy('created_at', 'DESC')->paginate(8)
        ]);
    }
}
