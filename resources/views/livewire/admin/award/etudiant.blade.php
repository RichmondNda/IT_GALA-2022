<div>

    <div class="flex  justify-center py-2 px-4 ">
        
        <div class="grid md:grid-cols-3 ">
           
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
    
            <div class="pt-5 w-32 ml-3 px-2 py-2  ">
              
                <select  wire:model='promotion' value="{{old('promotion')}}"
                         class="relative w-full px-4 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none form-select focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100">
       
                        <option value="10">IT 10</option>
                        <option value="9">IT 9</option>
                        <option value="8">IT 8</option>
                        <option value="7">IT 7</option>
                        <option value="6">IT 6</option>
                        <option value="5">IT 5</option>
                        <option value="4">IT 4</option>
                        <option value="3">IT 3</option>
                        <option value="2">IT 2</option>
                        <option value="1">IT 1</option>
                </select>
    
            </div>
    
        </div>


    </div>

    @if ($etudiants->isNotEmpty())
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y table-auto  divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Matricule 
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                   Nom et Prenoms
                                </th>
                                <th scope="col" class="px-6 hidden md:block py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Classe
                                </th>
                                <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Promotion
                                </th>

                            
                                

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($etudiants as $etudiant)
                                <tr>
                                    

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            
                                            <div class="ml-4">
                                                <div class="text-sm font-bold  text-gray-900 text-md">
                                                    {{$etudiant->matricule}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            
                                            <div class="ml-4">
                                                <div class="text-sm font-bold  text-gray-900 text-md">
                                                    {{$etudiant->nom}}
                                                </div>
                                                <div class="text-sm font-bold  text-gray-900 text-md">
                                                    {{$etudiant->prenom}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="hidden md:block   px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            
                                            <div class="ml-4">
                                                <div class="text-sm font-bold  text-gray-900 text-md">
                                                    {{$etudiant->classe}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            
                                            <div class="ml-4">
                                                <div class="text-sm font-bold  text-gray-900 text-md">
                                                    IT {{$etudiant->promotion}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            
                                            <button wire:click='nominer({{$etudiant->id}})' class="px-4 py-2 mt-5 font-bold text-white  bg-gray-600 rounded-md"> Nominer </button>
                                       
                                        </div>
                                    </td>
                                    --}}
                                    
                                </tr>
                                @endforeach
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2">
            {{$etudiants->links()}}
        </div>
    @else
        <div class="flex items-center justify-center w-full h-full text-2xl font-bold ">
            Auncun étudiant n'est enregistré pour l'instant
        </div>
    @endif

</div>
