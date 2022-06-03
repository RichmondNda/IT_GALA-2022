<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>C2E | IT GALA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="{{asset('css/particles.css')}}">

  <link rel="icon" href="{{asset('img/gala ed.png')}}" type="image/icon type">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body style="background-color: #fff">

<!-- particles.js container -->
<div id="particles-js" class="h-screen " >
    <div class="flex flex-col items-center justify-center w-full min-h-screen font-bold text-center " style="position:fixed">
        <img src="{{asset('img/gala ed.png')}}" class="w-32 md:w-64 md:h-64 h-32" alt="Logo Gala">
        {{-- <span class="text-white text-7xl" style="font-size:33px">
           IT GALA 2022
        </span>    --}}
        <span class="text-2xl text-gray-700" >
            Merci, les votes sont suspendus temporairement.
        </span>   
        <br>

   
    </div>
</div>

<!-- scripts -->
<script src="{{asset('js/particles.js')}}" ></script>
<script src="{{asset('js/app-particles1.js')}}"></script>


</body>
</html>