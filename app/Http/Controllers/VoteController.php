<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use App\Models\Vote;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        if(Auth::user()->etudiant)
        {
            $indicePromotion = Auth::user()->etudiant->promotion ;

            $categories = Categorie::where('gala_id', $gala->id)
                                    ->where(function($q) use ($indicePromotion){
                                        $q->where('indicePromotion', 0)
                                            ->orWhere('indicePromotion',$indicePromotion );
                                    })->get() ;

        }
        else
        {
            $categories = Categorie::where('gala_id', $gala->id)->get() ;
        }
        


        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        $statut = $gala->status ;

        if($statut)
        {
            return view('participants.categories', compact('categories'));
        }
        else
        {
            return view('galaStopVotes');
        }

      
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
