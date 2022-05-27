<div>
    
    <div id="app" class="py-12">

        <div class="text-center ">

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
                                >Hackaton </span
                                >
                                <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{$message}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="flex justify-center py-4">
                    
                    <div
                        class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-center w-12 bg-red-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                
                        <div class="px-4 py-2 -mx-3">
                            <div class="mx-3">
                                <span class="font-bold text-red-500 dark:text-red-400"
                                >IT-GALA </span
                                >
                                <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{$message}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endif

        </div>
        <span class="font-bold" v-if="!seen"> Scanner le code QR</span>
         <br>  
        
        <qrcode-stream @decode="onDecode"></qrcode-stream>
        <qrcode-drop-zone></qrcode-drop-zone>


        <div class="flex items-center justify-center h-32 py-4">
            <form action="{{route('qrcode.Soumission',null,false)}}" method="POST">
                @csrf
                <input id="Qrcodevalue"  name='qrcodeValue' type="hidden">
                <button v-if="seen" type="submit" class="px-3 py-2 font-bold text-white bg-indigo-800 rounded-md">
                    Validation 
                </button>
            </form>
        </div>
        
    </div>

    <x-slot name="scripts" >

        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/vueQrCode.js') }}" ></script>
        
        <script>
            var app = new Vue({
                el: '#app',
                methods: {
                    onDecode (decodedString) {
                        this.message = decodedString;
                        this.seen = true 
                        document.getElementById("Qrcodevalue").value = this.message
                    }
                },
                data: {
                    message: 'Hello Vue!',
                    seen: false
                }
            })
        </script>
  
    </x-slot>


 
</div>
