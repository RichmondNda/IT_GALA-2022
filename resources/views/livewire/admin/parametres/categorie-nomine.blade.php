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
                            <label class="font-bold ">Intitulé de la catégorie </label>
                            <input type="text" placeholder="libelle"   wire:model.defer='libelle' value="{{old("libelle")}}"
                              class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                               @error('libelle')
                                    <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('libelle') }}  </div>
                                @enderror
                        </div>


                        <div class="pt-0 mb-3">
                            <label class="font-bold ">Promotion </label>
                            <select  wire:model='promotion' value="{{old('promotion')}}"
                            class="relative w-full px-4 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none form-select focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100">
          
                                    <option value="0">Toutes les promotions</option>
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
                            
                            @error('promotion')
                                 <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('promotion') }}  </div>
                             @enderror
                        </div>

                        <div class="pt-0 mb-3">
                            <label class="font-bold ">nombre maximal de participants </label>
                            <input type="number" placeholder="nbMax" min="01"   wire:model.defer='nbMax' value="{{old("nbMax")}}"
                              class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                               @error('nbMax')
                                    <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('nbMax') }}  </div>
                                @enderror
                        </div>

                        <div class="flex justify-end">
                            <button 
                                wire:click.prevent='@if(!$edit_mode) createTypeTicket() @else updateCat({{$edit_id}}) @endif'
                                class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 rounded shadow outline-none ease-linearbg-emerald-500 bg-myblue hover:shadow-lg focus:outline-none" type="submit">
                                 
                                 @if(!$edit_mode) Enregistrer @else Mettre à jour @endif
                            </button>
                        </div>
        
                    </form> 
                </div>

            </div>
            <div class="col-span-4 ">

                
                
                @if ($categories->isNotEmpty())
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
                                       nb maximum
                                    </th>

                                    <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Promotition
                                     </th>

                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        nombre vote actuel
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        
                                    </th>
                                   

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($categories as $cat)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold text-gray-900 text-md">
                                                        {{$cat->libelle}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            
                                            <div class="font-bold text-gray-900 text-md">
                                                {{$cat->nbMax }} 
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            
                                            <div class="font-bold text-gray-900 text-md">
                                                @if($cat->indicePromotion == '0')
                                                    Toutes les promotions
                                                @else
                                                   {{'IT '.$cat->indicePromotion }} 
                                                @endif

                                            </div>
                                        </td>

                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold text-gray-900 text-md">
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold  text-gray-900 text-md">
                                                       
                                                        <button 
                                                            wire:click.prevent=' editCat({{$cat->id}})'
                                                            class="px-2 py-2 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 rounded shadow outline-none ease-linearbg-emerald-500 bg-myblue hover:shadow-lg focus:outline-none" type="submit">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>                     
                                                        </button>

                                                        <button 
                                                            wire:click.prevent='deleteCat({{$cat->id}})'
                                                            class="px-2 py-2 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 rounded shadow outline-none ease-linearbg-emerald-500 bg-red-600 hover:shadow-lg focus:outline-none" type="submit">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        </button>
                                                        
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
                        {{$categories->links()}}
                    </div>
                @else
                    <div class="flex items-center justify-center w-full h-full text-2xl font-bold ">
                        Aucune catégorie n'a été enregistrée
                    </div>
                @endif

            </div>

        </div>

    </div>

</div>
