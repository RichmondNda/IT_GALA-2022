<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ControlController extends Controller
{
    public function index()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first();

        $nb_scanne = Ticket::where(['statut'=> true, 'gala_id' => $gala->id ])->get()->count();
        $nb_tickets = Ticket::where(['gala_id' => $gala->id ] )->get()->count();
        return view('admin.controller.index', compact(['nb_scanne', 'nb_tickets'])) ;
    }

    public function Soumission(Request $request)
    {
        $codeDecrypte = Crypt::decryptString($request->qrcodeValue);

        $words = explode('@', $codeDecrypte,2);

        $codeGet = $words[1] ;
        
       $ticket = Ticket::where('code', $codeGet)->first() ;


        if(!$ticket->statut)
        {
            $ticket->nbUtilisation -= 1 ;

            $ticket->save() ;

            if( $ticket->nbUtilisation == 0)
            {
                $ticket->statut = true ;
                
                $ticket->save();

                $request->session()->flash('success', 'Excellent GALA ');
            }
            else
            {
                $request->session()->flash('success', 'Excellent GALA ! Nous attendons votre cavalier(e) ?');
            }
           
        }
        else{
            $request->session()->flash('error', 'Ce ticket à déjà été scanné');
        }
        

        return redirect()->back();
    }
}
