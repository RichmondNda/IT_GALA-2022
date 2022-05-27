<div>

    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                
                <div class="flex md:flex-row flex-col justify-center md:justify-between py-2 px-4 ">
        
                    <div class="pt-8 mb-4">
                        <a href="{{route('admin.award.nomination')}}" class="px-4 rounded-md py-2 bg-orange text-md text-white">Enregistrer un nominé</a>
                    </div>
                    <div class="grid md:grid-cols-3 ">
                        <div class="pt-0 mb-2">
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
                
                        <div class="pt-0 mb-2">
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
                
                        <div class="pt-6 w-64 ml-3 px-2 py-2  ">
                          
                            <select  wire:model='categorie' value="{{old('categorie')}}"
                                     class="relative w-full px-4 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none form-select focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100">
                                     <option value="">Toutes les categories</option>
                                    @foreach ($categories as $categorie )
                                        <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                                    @endforeach
                                   
                            </select>
                
                        </div>
                    </div>
            
                </div>
            
                @if ($nomines->isNotEmpty())
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
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Catégorie
                                            </th>
                                            <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                nombre de vote
                                            </th>
                                            <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                
                                            </th>
                                        
                                            
            
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($nomines as $nomine)
                                            <tr>
                                                
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$nomine->user->etudiant->matricule}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$nomine->user->etudiant->nom}}
                                                            </div>
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$nomine->user->etudiant->prenom}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$nomine->categorie->libelle}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
            
                                                
            
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                {{$nomine->votes()->count()}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        
                                                        <div class="ml-4">
                                                            <div class="text-sm font-bold  text-gray-900 text-md">
                                                                <button wire:click='SupprimerNominer({{$nomine->id}})'
                                                                    class="px-4 py-2 bg-red-600 text-white rounded-md "> Supprimer </button>
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
                        {{$nomines->links()}}
                    </div>
                @else
                    <div class="flex items-center justify-center w-full h-full text-2xl font-bold ">
                        Auncun Nominé n'est enregistré pour l'instant
                    </div>
                @endif

            </div>
        </div>
    </div>

   

</div>
