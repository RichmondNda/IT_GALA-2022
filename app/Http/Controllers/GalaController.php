<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use Illuminate\Http\Request;

class GalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galas = Gala::orderBy('created_at', 'DESC')->get();

        // return $galas
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
            'annee_gala' => 'required',
            'nom_pco1' => 'required|string',
            'nom_pco2' => 'required|string',
            'nb_place' => 'required|integer'
        ]);


        $gala = Gala::create([
            'annee' => $this->annee_gala,
            'nomPco1' => $this->nom_pco1,
            'nomPco2' => $this->nom_pco2,
            'nbPlace' => $this->nb_place
        ]);

        session()->flash('success', 'Gala enregistré avec success.');
        // return redirect()->back() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gala  $gala
     * @return \Illuminate\Http\Response
     */
    public function show(Gala $gala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gala  $gala
     * @return \Illuminate\Http\Response
     */
    public function edit(Gala $gala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gala  $gala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gala $gala)
    {

        $gala = Gala::where('id', $gala->id)->first();
        
        $request->validate([
            'nom_pco1' => 'required|string',
            'nom_pco2' => 'required|string',
            'nb_place' => 'required|integer'
        ]);


        $gala->update([
            'nomPco1' => $this->nom_pco1,
            'nomPco2' => $this->nom_pco2,
            'nbPlace' => $this->nb_place
        ]);

        session()->flash('success', 'Gala mis à jour avec success avec success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gala  $gala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gala $gala)
    {
        $gala = Gala::where('id', $gala->id)->first();

        if ($gala)
        {
            $gala->delete();
        }
    }
}
