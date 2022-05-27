<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Gala;
use App\Models\Ticket;
use App\Mail\TicketMail;


use App\Models\Etudiant;
use App\Models\Personne;
use App\Models\TypeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getTicket(int $id=3)
    {

        $personne = personne::find($id) ;
        
        $type = $personne->getTicket() ;

        $nom = $personne->nom;
        $prenom = $personne->prenom ;
        $code = $personne->getTicketCode() ;

        $m = Crypt::encryptString('Esatic@'.$code );
       
       
        $qr = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($m));
        $data = [
            
            'type' => $type,
            'nom' => $nom,
            'prenom' => $prenom,
            'identifiant' => $code,
            'qr_code' => $qr
        ];
          
        $pdf = PDF::loadView('admin.gala.ticket', $data);
       
       // return $pdf->download('dfdf.pdf');

        return $pdf->stream('ok.pdf');

       // return view('admin.gala.ticket') ;
    }

    public function sendTicketMail(int $id)
    {   
        $personne = personne::find($id) ;

        $maildata = [
            'title' => 'Ticket IT GALA 2022',
            'personne' => $personne
        ];

        
        $type = $personne->getTicket() ;

        $nom = $personne->nom;
        $prenom = $personne->prenom ;
        $code = $personne->getTicketCode() ;

        $m = Crypt::encryptString('Esatic@'.$code );
       
       
        $qr = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($m));
        $data = [
            
            'type' => $type,
            'nom' => $nom,
            'prenom' => $prenom,
            'identifiant' => $code,
            'qr_code' => $qr
        ];
          
        $pdf = PDF::loadView('admin.gala.ticket', $data);
       
        $pdf_name = $nom.'_'.$prenom ;
       // $email = $personne->email;
        $email = 'awabamba973@gmail.com' ;



        try {
            Mail::to($email)->send(new TicketMail($maildata, $pdf, $pdf_name));
            session()->flash('success', 'Mail envoyé avec success.');

        } catch (\Throwable $th) {
            session()->flash('Warning', 'Erreur d\envoie du mail');
        }

        return redirect()->back() ;
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categories = TypeTicket::where('gala_id', $gala->id)->get() ;

        $nb_tickets = Ticket::where(['gala_id' => $gala->id ] )->get()->count();

        $nb_max_tickets = $gala->nbPlace ;

        $etat = false ;
        if($nb_tickets <= $nb_max_tickets)
        {
            $etat = true ;
        }

        $nb_place_dispo = $nb_max_tickets - $nb_tickets ;


        return view('admin.tickets.create', compact(['categories', 'etat', 'nb_place_dispo'])) ;
    }

    public function createTCI()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = TypeTicket::where('gala_id', $gala->id)->where('libelle', 'couple interne')->first() ;

        return view('admin.tickets.createTCI', compact('categorie')) ;
    }

    public function createTCE()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = TypeTicket::where('gala_id', $gala->id)
        ->where('libelle', 'couple externe')->first() ;

        return view('admin.tickets.createTCE', compact('categorie')) ;
    }

    public function createTSI()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = TypeTicket::where('gala_id', $gala->id)
                    ->where('libelle', 'solo interne')->first() ;

        return view('admin.tickets.createTSI', compact('categorie')) ;
    }

    public function createTSE()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = TypeTicket::where('gala_id', $gala->id)
                        ->where('libelle', 'solo externe')->first() ;

        return view('admin.tickets.createTSE', compact('categorie')) ;
    }

    public function createTCM()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = TypeTicket::where('gala_id', $gala->id)
                        ->where('libelle', 'couple mixte')->first() ;

        return view('admin.tickets.createTCM', compact('categorie')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInterneCouple(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string|email',
            'contact' => 'required|string',
            'matricule_h' => 'required|string|min:10',
            'matricule_f' => 'required|string'
        ]);

        $typeTicket = TypeTicket::where('libelle', 'couple interne')->first() ;

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        // on verifie si ils n'ont pas déjà éffectué le paiement

        $personneExist1 = Personne::where('matricule', $request->matricule_h)->first() ;
        $personneExist2 = Personne::where('matricule', $request->matricule_f)->first() ;

        if($personneExist1 || $personneExist2)
        {
            session()->flash('Warning', 'l\'un des matricules à déjà été utilisé');

            return redirect()->back() ;
        }
        
        // verification des étudaints

        $etudiantHomme = Etudiant::where('matricule', $request->matricule_h)->first() ;

        if($etudiantHomme && $etudiantHomme->genre == 'M')
        {
            $etudiantFemme = Etudiant::where('matricule', $request->matricule_f)->first() ;

            if( $etudiantFemme  && $etudiantFemme->genre == 'F')
            {

                $personne_1 = Personne::create([
                    'nom' => $request->nom ,
                    'prenom' => $request->prenom,
                    'email' => $request->email ,
                    'contact' => $request->contact ,
                    'matricule' => $request->matricule_h ,

                ]);

                $personne_2 = Personne::create([
                    'nom' => $etudiantFemme->nom ,
                    'prenom' => $etudiantFemme->prenom,
                    'email' => $request->email ,
                    'contact' => $request->contact ,
                    'matricule' => $request->matricule_f ,

                ]);

                $ticket = Ticket::create([
                    'gala_id' => $gala->id,
                    'homme_id' => $personne_1->id,
                    'femme_id' => $personne_2->id,
                    'type_id' => $typeTicket->id,
                    'nbUtilisation' => 2,
                    'code' => ''
                ]);

                $code = 'ITGALA22-00'.$ticket->id ;
                $ticket->code = $code ;
                $ticket->save() ;


                session()->flash('success', 'Ticket enregistré avec success.');
            }
            elseif($etudiantFemme->genre != 'F')
            {
                session()->flash('Warning', $request->matricule_f.' n\'est pas le matricule d\'une femme');
            }
            else
            {
                session()->flash('Warning', 'Matricule de la femme incorrecte .');
            }

           return redirect()->back() ;
        }
        elseif($etudiantHomme->genre != 'M')
        {
            session()->flash('Warning', $request->matricule_h.' n\'est pas le matricule d\'un homme');
        }
        else
        {
            session()->flash('Warning', 'Matricule de l\'homme incorrecte .');
        }

        redirect()->back() ;
       
    }


    public function storeInterneSolo(Request $request)
    {
        
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string|email',
            'contact' => 'required|string',
            'matricule' => 'required|min:10',
        ]);
       
        $typeTicket = TypeTicket::where('libelle', 'solo interne')->first() ;
          
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        // on verifie si ils n'ont pas déjà éffectué le paiement

        $personneExist = Personne::where('matricule', $request->matricule)->first() ;
       

        if($personneExist)
        {
            session()->flash('Warning', 'le matricule à déjà été utilisé');

            return redirect()->back() ;
        }
        
        // verification des étudaints

        $etudiant = Etudiant::where('matricule', $request->matricule)->first() ;

        if($etudiant)
        {
            
            $personne = Personne::create([
                'nom' => $request->nom ,
                'prenom' => $request->prenom,
                'email' => $request->email ,
                'contact' => $request->contact ,
                'matricule' => $request->matricule

            ]);


            $ticket = Ticket::create([
                'gala_id' => $gala->id,
                'personne_id' => $personne->id,
                'type_id' => $typeTicket->id,
                'code' => ''
            ]);

            $code = 'ITGALA22-00'.$ticket->id ;
            $ticket->code = $code ;
            $ticket->save() ;


            session()->flash('success', 'Ticket enregistré avec success.');
    
        }
        
        else
        {
            session()->flash('Warning', 'Matricule  incorrecte .');
        }


        return redirect()->back() ;
       
    }


    public function storeExterneSolo(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string|email',
            'contact' => 'required|string',
            'profession' => 'required|string',
        ]);

        $typeTicket = TypeTicket::where('libelle', 'solo externe')->first() ;

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        $personne = Personne::create([
            'nom' => $request->nom ,
            'prenom' => $request->prenom,
            'email' => $request->email ,
            'contact' => $request->contact ,
            'profession' => $request->profession

        ]);

        $ticket = Ticket::create([
            'gala_id' => $gala->id,
            'personne_id' => $personne->id,
            'type_id' => $typeTicket->id,
            'code' => ''
        ]);

        $code = 'ITGALA22-00'.$ticket->id ;
        $ticket->code = $code ;
        $ticket->save() ;

        session()->flash('success', 'Ticket enregistré avec success.');
    
        return redirect()->back() ;
       
    }


    public function storeExterneCouple(Request $request)
    {
        $request->validate([
            'nom_h' => 'required|string',
            'prenom_h' => 'required|string',
            'email_h' => 'required|string|email',
            'nom_f' => 'required|string',
            'prenom_f' => 'required|string',
            'email_f' => 'required|string|email',
            'contact' => 'required|string',
            'profession_h' => 'required|string',
        ]);

        $typeTicket = TypeTicket::where('libelle', 'couple externe')->first() ;

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        $personne_1 = Personne::create([
            'nom' => $request->nom_h ,
            'prenom' => $request->prenom_h,
            'email' => $request->email_h ,
            'contact' => $request->contact ,
            'profession' => $request->profession
        ]);


        $ticket = Ticket::create([
            'gala_id' => $gala->id,
            'homme_id' => $personne_1->id,
            'femme_id' => $personne_1->id,
            'type_id' => $typeTicket->id,
            'nbUtilisation' => 2,
            'code' => ''
        ]);

        $code = 'ITGALA22-00'.$ticket->id ;
        $ticket->code = $code ;
        $ticket->save() ;

        session()->flash('success', 'Ticket enregistré avec success.');
    
        return redirect()->back() ;
       
    }

    public function storeMixteCouple(Request $request)
    {
        $request->validate([
            'nom_i' => 'required|string',
            'prenom_i' => 'required|string',
            'email_i' => 'required|string|email',

            'nom_e' => 'required|string',
            'prenom_e' => 'required|string',
            'email_e' => 'required|string|email',

            'contact_i' => 'required|string',
            'matricule' => 'required|string|min:10',
        ]);

        $typeTicket = TypeTicket::where('libelle', 'couple mixte')->first() ;

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;


        // on verifie si ils n'ont pas déjà éffectué le paiement

        $personneExist = Personne::where('matricule', $request->matricule)->first() ;
       

        if($personneExist)
        {
            session()->flash('Warning', 'le matricule à déjà été utilisé');

            return redirect()->back() ;
        }
        
        // verification des étudaints

        $etudiant = Etudiant::where('matricule', $request->matricule)->first() ;

        if($etudiant)
        {
            
            $personne_i = Personne::create([
                'nom' => $request->nom_i ,
                'prenom' => $request->prenom_i,
                'email' => $request->email_i ,
                'contact' => $request->contact ,
                'matricule' => $request->matricule
            ]);

            $personne_e = Personne::create([
                'nom' => $request->nom_e ,
                'prenom' => $request->prenom_e,
                'email' => $request->email_e 
            ]);


            $ticket = Ticket::create([
                'gala_id' => $gala->id,
                'homme_id' => $personne_i->id,
                'femme_id' => $personne_e->id,
                'type_id' => $typeTicket->id,
                'nbUtilisation' => 2,
                'code' => ''
            ]);

            $code = 'ITGALA22-00'.$ticket->id ;
            $ticket->code = $code ;
            $ticket->save() ;

            session()->flash('success', 'Ticket enregistré avec success.');
    
        }
        
        else
        {
            session()->flash('Warning', 'Matricule de l\'homme incorrecte .');
        }


        return redirect()->back() ;
       
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
