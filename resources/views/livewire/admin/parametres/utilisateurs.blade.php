<div>
    
    <div class="px-4 py-5 ">

        <div class="md:grid md:grid-cols-6 gap-4">

            <div class="col-span-2 ">
                
                <div class="text-md  font-bold text-center">
                    Enregistrer un utilisateur
                </div>

                <div class="px-6 mt-6">
                    <form method="POST">
                        @csrf
                    
                        <div class="pt-0 mb-3">
                            <label class="font-bold ">Nom d'utilisateur </label>
                            <input type="text" placeholder="username"   wire:model.defer='username' value="{{old("username")}}"
                              class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                               @error('username')
                                    <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('username') }}  </div>
                                @enderror
                        </div>

                        <div class="pt-0 mb-3">
                            <label class="font-bold ">Email de l'utilisateur </label>
                            <input type="email" placeholder="email"   wire:model.defer='email' value="{{old("email")}}"
                              class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                               @error('email')
                                    <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('email') }}  </div>
                                @enderror
                        </div>


                        <div class="pt-0 mb-3">
                            <label class="font-bold ">Categorie </label>
                            <select  wire:model='categorie' value="{{old('categorie')}}"
                            class="relative w-full px-4 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none form-select focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100">
          
                                    <option value=""> Aucune categorie</option>
                                    <option value="Caissiere">Caissiere</option>
                                    <option value="Controlleur">Controlleur</option>
                                    <option value="Administrateur">Administrateur</option>
                           
                            </select>
                            
                            @error('categorie')
                                 <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('categorie') }}  </div>
                             @enderror
                        </div>

        
                        <div class="flex justify-end">
                            <button 
                                wire:click.prevent='createUser()'
                                class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 rounded shadow outline-none ease-linearbg-emerald-500 bg-myblue hover:shadow-lg focus:outline-none" type="submit">
                                 Enregistrer
                            </button>
                        </div>
        
                    </form> 
                </div>

            </div>
            <div class="col-span-4 ">

                
                
                @if ($utilisateurs->isNotEmpty())
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y table-auto  divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Pseudo
                                    </th>
                                    <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                       Somme en possesion
                                    </th>

                                    <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Categorie
                                     </th>

                                     <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        
                                     </th>

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($utilisateurs as $utilisateur)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold text-gray-900 text-md">
                                                        {{$utilisateur->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            
                                            <div class="font-bold text-gray-900 text-md">
                                               {{$utilisateur->sommeEnPossesion(). ' F CFA'}}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            
                                            <div class="font-bold text-gray-900 text-md">
                                               
                                                @foreach ($utilisateur->getRoleNames() as $role )
                                                    {{$role}}
                                                @endforeach

                                            </div>
                                        </td>

                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                
                                                <div class="ml-4">
                                                    <div class="font-bold text-gray-900 text-md">
                                                     {{$utilisateur->logsTicket()   }}
                                                     
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
                        {{$utilisateurs->links()}}
                    </div>
                @else
                    <div class="flex items-center justify-center w-full h-full text-2xl font-bold ">
                        Aucune utilisateur n'a été enregistré
                    </div>
                @endif

            </div>

        </div>

    </div>

</div>
