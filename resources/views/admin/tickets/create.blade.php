<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div>

        <div class="mx-auto max-w-7xl sm:px-6 md:px-4">

            <div class="pt-8 px-6 md:flex gap-6  md:justify-between">
               <div>
                <a href="{{route('admin.ticket.liste')}}" class="px-4 rounded-md py-2 bg-orange text-md font-bold">Liste achetteurs</a>
               </div>
               <div class="text-xl font-bold py-6 ">
                   Il y a <span class="bg-myblue text-white rounded-md px-2">{{$nb_place_dispo}} tickets(s)</span> disponibles
               </div>
            </div>

            <div class="overflow-hidden sm:rounded-lg">
                
                <div class="  ">
                      
                        <div class=" py-4  my-2 ">

                            <div class="grid md:grid-cols-12  md:gap-6 gap-2">
                                
                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                            Couple Interne
                                        </div>
                                       
                                        @if($etat)
                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tci')}}"> Enregistrer </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>

                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                            Couple Externe
                                        </div>
                                       
                                        @if($etat)
                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tce')}}"> Enregistrer </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>

                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                             Solo Interne
                                        </div>
                                       
                                        @if($etat)
                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tsi')}}"> Enregistrer </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>

                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                             Solo Externe
                                        </div>
                                       
                                        @if($etat)
                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tse')}}"> Enregistrer </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>

                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                             Couple Mixte
                                        </div>
                                       
                                        @if($etat)
                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tcm')}}"> Enregistrer </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>
                                
                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                             Couple Duo
                                        </div>
                                       
                                        @if($etat)
                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tdi')}}"> Enregistrer </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>
                               

                            </div>
                                
                                             
                        </div>

                </div>
                
            </div>
        </div>
    </div>

   
</x-app-layout>
