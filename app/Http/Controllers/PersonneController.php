<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use App\Models\Personne;
use App\Models\TypeTicket;
use Illuminate\Http\Request;

class PersonneController extends Controller
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
            'nom_per' => 'required|string',
            'prenom_per' => 'required|string',
            'email_per' => 'required|string|email',
            'contact_per' => 'required|string',
            'profession_per' => 'required|string',
            'matricule_per' => 'required|string',
        ]);

       
        $personne = Personne::create([
            'nom' => $this->nom_per,
            'prenom' => $this->prenom_per,
            'email' => $this->email_per,
            'contact' => $this->contact_per,
            'profession' => $this->profession_per,
            'matricule' => $this->matricule_per
        ]);

        // $type_ticket = TypeTicket::where('id', $request->type_ticket)->first() ;
        // $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        // cette partie depend du front 

        session()->flash('success', 'Catégorie de Ticket enregistré avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        //
    }
}
