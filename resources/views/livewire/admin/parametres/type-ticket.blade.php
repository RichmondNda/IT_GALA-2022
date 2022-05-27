<div>
    
    <div class="px-4 py-5 ">

        <div class="md:grid md:grid-cols-6 gap-4">

            <div class="col-span-2 ">
                
                <div class="text-md  font-bold text-center">
                    Enregistrer une categorie de ticket
                </div>

                <div class="px-6 mt-6">
                    <form method="POST">
                        @csrf
                    
                        <div class="pt-0 mb-3">
                            <label class="font-bold ">Intitulé du ticket </label>
                            <input type="text" placeholder="libelle"   wire:model.defer='libelle' value="{{old("libelle")}}"
                              class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                               @error('libelle')
                                    <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('libelle') }}  </div>
                                @enderror
                        </div>

                        <div class="pt-0 mb-3">
                            <label class="font-bold ">Prix du ticket </label>
                            <input type="number" placeholder="prix" min="1000"   wire:model.defer='prix' value="{{old("prix")}}"
                              class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                               @error('prix')
                                    <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('prix') }}  </div>
                                @enderror
                        </div>

                        <div class="flex justify-end">
                            <button 
                                wire:click.prevent='createTypeTicket()'
                                class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 rounded shadow outline-none ease-linearbg-emerald-500 bg-myblue hover:shadow-lg focus:outline-none" type="submit">
                                 Enregistrer
                            </button>
                        </div>
        
                    </form> 
                </div>

            </div>
            <div class="col-span-4 ">

                
                
                @if ($typeTickets->isNotEmpty())
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y table-auto  divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Libellé
                                    </th>
                                    <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                       Prix
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        
                                    </th>
                                   

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($typeTickets as $type)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold text-gray-900 text-md">
                                                        {{$type->libelle}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            
                                            <div class="font-bold text-gray-900 text-md">
                                                {{$type->prix}} 
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold text-gray-900 text-md">
                                                      {{$type->tickets()->count()}}
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
                        {{$typeTickets->links()}}
                    </div>
                @else
                    <div class="flex items-center justify-center w-full h-full text-2xl font-bold ">
                        Aucun type de ticket n'a été enregistré
                    </div>
                @endif

            </div>

        </div>

    </div>

</div>
