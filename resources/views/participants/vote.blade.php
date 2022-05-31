<x-app-layout>
    

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                

                @if ($message = Session::get('success'))
                    <div class="flex justify-center py-4">
                        
                        <div
                            class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        
                            <div class="flex items-center justify-center w-12 bg-green-500">
                                <svg
                                class="w-6 h-6 text-white fill-current"
                                viewBox="0 0 40 40"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"
                                />
                                </svg>
                            </div>
                    
                            <div class="px-4 py-2 -mx-3">
                                <div class="mx-3">
                                    <span class="font-bold text-green-500 dark:text-green-400"
                                    >IT-AWARD </span
                                    >
                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                    {{$message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endif 

                @if ($message = Session::get('Warning'))
                    <div class="flex  justify-center py-4">
                        
                        <div
                            class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        
                            <div class="flex items-center justify-center w-12 bg-amber-500">
                                <svg
                                class="w-6 h-6 text-white fill-current"
                                viewBox="0 0 40 40"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"
                                />
                                </svg>
                            </div>
                    
                            <div class="px-4 py-2 -mx-3">
                                <div class="mx-3">
                                    <span class="font-bold text-amber-500 dark:text-amber-400"
                                    >IT-AWARD </span
                                    >
                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                    {{$message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endif
        

                <div>
                    CATEGORIE : <span class="text-xl font-bold ">{{$categorie->libelle}}</span>
                </div>


                <div class="grid md:grid-cols-12 gap-6 px-4">

                    @foreach ($categorie->nomines as $nomine )
                    
                        <div class="col-span-3 bg-white rounded-md shadow-sm p-4  ">
                            
                            <div class="h-64 flex justify-center ">
                                @if(env("FILESYSTEM_DRIVER")=="s3")
                                    <img class="object-contain  h-full"   src="{{Storage::url($nomine->photo)}}" alt="{{$nomine->user->etudiant->nom}}">
                                @else
                                    <img class="object-contain  h-full"   src="{{asset('images/'. $nomine->photo)}}" alt="{{$nomine->user->etudiant->nom}}">
                                @endif
                            </div>


                            <div class="pt-4">
                                <div class=" flex justify-between ">
                                    <div class="text-sm ">
                                        <p class="font-bold">{{$nomine->user->etudiant->nom}} 
                                            <span class=" text-amber-500">(IT {{$nomine->user->etudiant->promotion}})</span>
                                        </p>
                                        <p class="text-xs">{{$nomine->user->etudiant->prenom}}</p>
                                    </div>
    
                                    <div >

                                        @if (Auth::user()->hasVoteFor( $categorie->id , $nomine->id  ) )
                                        
                                            <form action="{{route('admin.award.remove_vote', null, false)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="categorie" value="{{$categorie->libelle}}">
                                                <input type="hidden" name="matricule" value="{{$nomine->user->etudiant->matricule}}">
                                                <button 
                                                    type="submit"
                                                    class="px-4 py-2  mr-1 text-sm font-bold text-white uppercase transition-all duration-150 cursor-pointer rounded shadow outline-none bg-red-500 ease-linearbg-emerald-500 hover:shadow-lg focus:outline-none">
                                                    Annuler
                                                </button>
                                            </form>

                                            @elseif( !Auth::user()->hasVote( $categorie->id))

                                                <form action="{{route('admin.award.effectuer_vote', null, false)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="categorie" value="{{$categorie->libelle}}">
                                                    <input type="hidden" name="matricule" value="{{$nomine->user->etudiant->matricule}}">
                                                    <button 
                                                        type="submit"
                                                        class="px-4 py-2  mr-1 text-sm font-bold text-white uppercase transition-all duration-150 cursor-pointer rounded shadow outline-none bg-myblue ease-linearbg-emerald-500 hover:shadow-lg focus:outline-none">
                                                        Voter
                                                    </button>
                                                </form>

                                        @endif

                                        
                                    </div>
    
                                </div>
                            </div>
                            
                        </div>

                        @endforeach
                    
                </div>
    
               
               

            </div>
        </div>
    </div>
  
</x-app-layout>