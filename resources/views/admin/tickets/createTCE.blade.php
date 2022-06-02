<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                
                <div class="  py-6 px-6">

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
                                            >IT GALA </span
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
                                            >IT GALA </span
                                            >
                                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{$message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif

                        <div class=" py-4  my-4 ">

                            <form  style="" action="{{ route('admin.ticket.store.tce',null,false) }}" class="" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="grid md:grid-cols-6 gap-6">
                                    
                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Nom de l'homme</label>
                                        <input type="text" placeholder="Nom de l'homme"   name='nom_h' value="{{old("nom_h")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('nom_h')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('nom_h') }}  </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Prenom de l'homme</label>
                                        <input type="text" placeholder="prenom de l'homme"   name='prenom_h' value="{{old("prenom_h")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('prenom_h')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('prenom_h') }}  </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Adresse Email de l'homme</label>
                                        <input type="email" placeholder="email"   name='email_h' value="{{old("email_h")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('email_h')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('email_h') }}  </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Nom de la femme </label>
                                        <input type="text" placeholder="Nom de la femme "   name='nom_f' value="{{old("nom_f")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('nom_f')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('nom_f') }}  </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Prenom de la femme </label>
                                        <input type="text" placeholder="prenom de la femme "   name='prenom_f' value="{{old("prenom_f")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('prenom_f')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('prenom_f') }}  </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Adresse Email de la femme </label>
                                        <input type="email" placeholder="email"   name='email_f' value="{{old("email_f")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('email_f')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('email_f') }}  </div>
                                        @enderror
                                    </div>

                                    

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Contact</label>
                                        <input type="tel" placeholder="contact"   name='contact' value="{{old("contact")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('contact')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('contact') }}  </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Profession de l'Homme </label>
                                        <input type="text" placeholder="matricule de l'homme"   name='profession_h' value="{{old("profession_h")}}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                        @error('profession_h')
                                                <div class="text-sm font-thin text-center text-red-600">{{ $errors->first('profession_h') }}  </div>
                                        @enderror
                                    </div>

                                    

                                    <div class=" col-span-2 pt-0 mb-3">
                                        <label class="font-bold ">Statut</label>
                                        <input type="text" disabled value="Couple de personne externe à l'ESATIC"
                                        class="relative w-full px-3 py-2 text-md text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                       
                                    </div>

                                    <div class=" col-span-2 pt-0 mb-3">
                                        <label class="font-bold "> Prix du Ticket </label>
                                        <input type="text" disabled value=" {{ $categorie->prix }} F CFA"
                                        class="relative w-full px-3 font-bold py-2 text-md  placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                       
                                    </div>

                                    <div class="col-span-2 flex justify-center">
                                        <div class="">
                                            <button class="px-4 py-2 mt-5 font-bold  bg-gray-600 rounded-md">  Enregistrer </button>
                                        </div>
                                    </div>

                                </div>
                                
                               
                            </form>
                                             
                    </div>

                </div>
                
            </div>
        </div>
    </div>

   
</x-app-layout>
