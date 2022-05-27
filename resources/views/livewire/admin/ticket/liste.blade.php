<div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">
                
                
                <div class="flex justify-center py-2 px-4 ">
        
                    <div class="pt-0 mb-3">
                        <div class="ml-3 ">
                            <label for="matricule" class="font-bold text-gray-700">Matricule</label>
                          </div>
                         <div class="flex items-start px-3 py-2">
                            <div class="flex items-center ">
                              <input   wire:model='matricule' value="{{old('matricule')}}"
                               id="matricule" type="text" class="w-64 h-8 border-gray-300 rounded text-orange focus:ring-orange">
                            </div>
                            
                        </div> 
            
                    </div>
            
                    <div class="pt-0 mb-3">
                        <div class="ml-3 ">
                            <label for="nom" class="font-bold text-gray-700">Nom ou prénoms</label>
                          </div>
                         <div class="flex items-start px-3 py-2">
                            <div class="flex items-center ">
                              <input   wire:model='nom' value="{{old('nom')}}"
                               id="nom" type="text" class="w-64 h-8 border-gray-300 rounded text-orange focus:ring-orange">
                            </div>
                            
                        </div> 
            
                    </div>
            
                 
            
            
                </div>

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
                                >TICKET GALA </span
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
                <div class="flex justify-center py-4">
                    
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
                                >TICKET GALA </span
                                >
                                <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{$message}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endif
            
                @if ($personnes->isNotEmpty())
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y table-auto  divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
            
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Nom et Prenoms
                                             </th>
            
                                                                            
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Contact et Email
                                            </th>
            
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Matricule ou  proffession
                                            </th>
            
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Ticket
                                            </th>
            
                                            <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                
                                            </th>
            
            
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($personnes as $personne)
                                            <tr>
                                       
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$personne->nom}}
                                                            </div>
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$personne->prenom}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$personne->contact}}
                                                            </div>
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$personne->email}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                
                                                                @if($personne->matricule)
                                                                    {{$personne->matricule}}
                                                                @else
                                                                    {{$personne->profession}}
                                                                @endif
            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{ $personne->getTicket() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="flex gap-4" >
                                                                <a href="{{route('admin.ticket.show', $personne->id)}}" class="text-sm font-bold  text-gray-800 border-2 px-2 rounded-full  py-2 text-md"> 
                                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                                                </a>
                                                                <a href="{{route('admin.ticket.send_mail', $personne->id)}}"  class="text-sm font-bold  text-amber-500 border-2 px-2 rounded-full  py-2 text-md">
                                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                                </a>
                                                                {{--  href="https://wa.me/+225{{$personne->contact}}?text='Bonjour j'espère que tu vas bien. Veuille bien vérifier ta boîte mail, ton ticket a été envoyé'"  --}}
                                                                <a href="https://wa.me/+2250708873469?text=Bonjour, Bonsoir {{$personne->nom}} {{$personne->prenom}} j'espère que vous allez bien. Veuillez bien vérifier votre boîte mail, votre ticket vous été envoyé.                            Cordialement, le C2E"  class="text-sm font-bold  text-green-400 border-2 px-2 rounded-full  py-2 text-md">
                                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="py-2">
                        {{$personnes->links()}}
                    </div>
                @else
                    <div class="flex items-center justify-center w-full h-full text-2xl font-bold ">
                        Auncun ticket n'est acheté pour l'instant
                    </div>
                @endif

            </div>
        </div>
    </div>


</div>
