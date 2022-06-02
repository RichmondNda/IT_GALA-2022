<x-app-layout>
    
    <x-slot name="header">
        <h2 class=" text-xl font-bold text-gray-800 leading-tight">
            {{ __('IT AWARD 2022') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto px-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                
                <div class="grid md:grid-cols-12  gap-6 ">

                    
                    @foreach ($categories as $categorie )
                    
                        <div class="col-span-3 bg-white rounded-md shadow-sm p-4  ">
                                
                            @if(Auth::user()->hasVote($categorie->id))

                                <div class="h-64 flex justify-center ">
                                    @if(env("FILESYSTEM_DRIVER")=="s3")
                                        <img class="object-contain  h-full"   src="{{Storage::url(Auth::user()->getPersoneVoted($categorie->id)->photo)}}" alt="{{Auth::user()->getPersoneVoted($categorie->id)->user->etudiant->nom}}">
                                    @else
                                        <img class="object-contain  h-full"   src="{{asset('images/'.  Auth::user()->getPersoneVoted($categorie->id)->photo)}}" alt="{{Auth::user()->getPersoneVoted($categorie->id)->user->etudiant->nom}}">
                                    @endif
                                </div>


                                <div class="pt-4">
                                    <div class=" flex justify-between ">
                                        <div class="text-sm ">
                                            <p class="font-bold">{{ Auth::user()->getPersoneVoted($categorie->id)->user->etudiant->nom}} 
                                                <span class=" text-amber-500">({{$categorie->libelle}})</span>
                                            </p>
                                            <p class="text-xs">{{Auth::user()->getPersoneVoted($categorie->id)->user->etudiant->prenom}}</p>
                                        </div>

                                        <div >

                                            @if (Auth::user()->hasVoteFor( $categorie->id , Auth::user()->getPersoneVoted($categorie->id)->id  ) )
                                            
                                                <form action="{{route('admin.award.remove_vote', null, false)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="categorie" value="{{$categorie->libelle}}">
                                                    <input type="hidden" name="matricule" value="{{Auth::user()->getPersoneVoted($categorie->id)->user->etudiant->matricule}}">
                                                    <button 
                                                        type="submit"
                                                        class="px-4 py-2  mr-1 text-sm font-bold text-white uppercase transition-all duration-150 cursor-pointer rounded shadow outline-none bg-red-500 ease-linearbg-emerald-500 hover:shadow-lg focus:outline-none">
                                                        Annuler
                                                    </button>
                                                </form>

                                            @else

                                                <form action="{{route('admin.award.liste_vote_categorie', null, false)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="categorie" value="{{$categorie->id}}">
                                                    
                                                    <button 
                                                        type="submit"
                                                        class=" px-2 mr-1 text-sm font-bold  text-myblue bg-gray-200 shadow-md ronded-sm shadow-sm bg-white">
                                                        Consulter
                                                    </button>
                                                </form>
                                            @endif

                                            
                                        </div>

                                    </div>
                                </div> 

                            @else

                                <div class="h-64 flex items-center justify-center ">
                                <span class="font-bold text-xl"> {{$categorie->libelle}} </span>
                                </div>


                                <div class="pt-4">
                                    <div class=" flex items-center justify-center">

                                        
                                        <form action="{{route('admin.award.liste_vote_categorie', null, false)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="categorie" value="{{$categorie->id}}">
                                            
                                            <button 
                                                type="submit"
                                                class="px-4 py-2  mr-1 text-sm font-bold  uppercase transition-all duration-150 cursor-pointer rounded shadow outline-none bg-orange ease-linearbg-emerald-500 hover:shadow-lg focus:outline-none">
                                                Proceder au vote
                                            </button>
                                        </form>
                                        
                                    </div>
                                </div>

                            @endif
                        
                        </div>

                    @endforeach
                    
                    
                </div>             

            </div>
        </div>
    </div>
  
</x-app-layout>
