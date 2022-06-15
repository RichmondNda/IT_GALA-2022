<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use App\Models\Ticket;
use PDF;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function exportPdfListe()
    {

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        
        $tickets = Ticket::where('gala_id', $gala->id)->get() ;
         
        $data = [
            'title' => 'IT GALA 2022',
            'date' => date('d-m-Y à h:i:s A'),
            'tickets' => $tickets
            
        ];

    
          
        $pdf = PDF::loadView('pdf.listes', $data)->setPaper('a4', 'landscape');
    
        // return $pdf->download('listeEquipes.pdf');

        return $pdf->stream('ListeParticipants.pdf');
    }
}
