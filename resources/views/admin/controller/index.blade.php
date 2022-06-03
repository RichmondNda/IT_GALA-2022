<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('IT GALA') }}
        </h2>
    </x-slot>

    <div class="px-2 py-4 md:h-screen md:py-12">
       <div class="h-full gap-8 md:grid md:grid-cols-6 " >

        <div class="col-span-2 px-2 md:h-full ">
           
        </div>
        <div class="col-span-2 px-2 md:h-full ">
            @livewire('admin.ticket.qr-code')
        </div>

        <div class="font-bold md:col-span-2 h-full  text-center md:text-2xl text-xl ">
            Nous avons scanné <span class="text-myblue"> {{$nb_scanne}}/ {{$nb_tickets}} </span> ticket(s).
            
        </div>

       </div>
    </div>

 

</x-app-layout>
