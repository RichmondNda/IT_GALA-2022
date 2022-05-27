<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use App\Models\TypeTicket;
use Illuminate\Http\Request;

class TypeTicketController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle_ticket' => 'required|string',
            'prix_ticket' => 'required|integer'
        ]);


        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        $typeticket = TypeTicket::create([
            'libelle' => $this->libelle_ticket,
            'prix' => $this->nom_pco1,
            'gala_id' => $gala->id
        ]);

        session()->flash('success', 'Catégorie de Ticket enregistré avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeTicket  $typeTicket
     * @return \Illuminate\Http\Response
     */
    public function show(TypeTicket $typeTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeTicket  $typeTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeTicket $typeTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeTicket  $typeTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeTicket $typeTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeTicket  $typeTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeTicket $typeTicket)
    {
        //
    }
}
