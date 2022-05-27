<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Etudiant;
use App\Models\Gala;
use App\Models\Nomine;
use App\Models\User;
use Illuminate\Http\Request;

class NomineController extends Controller
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
        $categories = Categorie::all() ;
        return view('admin.nomination', compact('categories'));
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
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'matricule' => 'required|min:10',
            'categorie' => 'required'
        ]);


       

        $categorie = Categorie::where('id', $request->categorie)->first() ;
        $nbNomine = Nomine::where('categorie_id' ,$categorie->id)->count();

        if($categorie->nbMax >= $nbNomine )
        {

            $etudiant = Etudiant::where('matricule', $request->matricule)->first() ;

            if($etudiant)
            {

                $gala = Gala::orderBy('created_at', 'DESC')->first() ;
                $user = User::where('id', $etudiant->user_id)->first();

                
                $imageName = uniqid().'Award'.time().'.'.$request->photo->extension();  
            
                $request->photo->move(public_path('images'), $imageName);

                

                $exist = Nomine::where('user_id', $user->id)->first();

                if(!$exist)
                {
                    $nomine = Nomine::create([
                             'photo' => $imageName,
                             'user_id' => $user->id,
                             'categorie_id' => $categorie->id,
                             'gala_id' => $gala->id
                         ]);
                 
                         session()->flash('success', $etudiant->nom.' '.$etudiant->prenom.' enregistré avec succes.');
         
                }

                else{

                    session()->flash('Warning', 'Ce étudiant est déjà nominé pour cette catégorie.');
                  
                }

                
                
            }
            else{
                session()->flash('Warning', 'Le matricule saisie est incorrecte.');
                
            }

        }
        else
        {
            session()->flash('Warning', 'Le nombre maximal de nominé est atteint.');
            
        }


        return redirect()->back();

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nomine  $nomine
     * @return \Illuminate\Http\Response
     */
    public function show(Nomine $nomine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nomine  $nomine
     * @return \Illuminate\Http\Response
     */
    public function edit(Nomine $nomine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nomine  $nomine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nomine $nomine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomine  $nomine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomine $nomine)
    {
        //
    }
}
