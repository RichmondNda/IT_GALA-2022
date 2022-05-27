<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use App\Models\Nomine;
use App\Models\Etudiant;
use App\Models\Categorie;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $request->validate([
            'categorie' => 'required'
        ]);



        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        
        $categorie = Categorie::where('gala_id', $gala->id )->where('id', $request->categorie )->first() ;

        return view('participants.vote', compact('categorie'));
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
            'categorie' => 'required',
            'matricule' => 'required'
        ]);

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = Categorie::where('libelle', $request->categorie)->first();

        if($categorie)
        {
            $etudiant = Etudiant::where('matricule', $request->matricule)->first();

            if($etudiant)
            {

                $nomine = Nomine::where('user_id', $etudiant->user_id)->first() ;
                
                if($nomine)
                {
                    Vote::create([
                        'gala_id' => $gala->id,
                        'nomine_id' => $nomine->id,
                        'categorie_id' => $categorie->id,
                        'user_id' => Auth::user()->id
                    ]);


                    session()->flash('success', 'vote enregistré avec succes.');
                }
                else
                {
                    session()->flash('Warning', 'Nominé inexistant.');
                }

            }
            else
            {
                session()->flash('Warning', 'Etudiant inexistant.');
            }
        }
        else
        {
            session()->flash('Warning', 'Catégorie inexistante.');
        }

       return redirect()->route('admin.award.liste_categorie') ;
    }


    public function removeVote(Request $request)
    {
        $request->validate([
            'categorie' => 'required',
            'matricule' => 'required'
        ]);

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;
        $categorie = Categorie::where('libelle', $request->categorie)->first();

        if($categorie)
        {
            
            $vote  = Vote::where(['user_id' => Auth::user()->id, 'categorie_id' => $categorie->id])->delete() ;


            session()->flash('success', 'Vote Annulé avec succes.');
               
        }
        else
        {
            session()->flash('Warning', 'Catégorie inexistante.');
        }

       return redirect()->back() ;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }
}
