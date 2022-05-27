<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | Page non trouvée </title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="icon" href="{{asset('img/gala ed.png')}}" type="image/icon type">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="flex items-center justify-center w-full min-h-screen text-xl bg-gray-50">
        
      <div class="inline-block"> 
        <div style="font-size:150px; font-family: Arial, Helvetica, sans-serif; font-weight:bolder " class="text-gray-500 " >
           
            4<span class="m-0 text-orange">0</span>4
            
        </div>
        <div class="pt-10 text-2xl font-bold text-center text-gray-500 ">
            Page Non trouvée
        </div>  
        <div class="pt-1 text-xs font-bold text-center underline text-myblue ">
            <a href="{{route('welcome')}}">
                revenir à l'accueil
            </a>
        </div>  
      </div>  
  
    </div>
</body>
</html>