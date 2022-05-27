<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403 | Page Non autorisée </title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="icon" href="{{asset('img/gala ed.png')}}" type="image/icon type">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="flex flex-col items-center justify-center w-full min-h-screen text-xl bg-gray-50">
        
      
        <div style="font-size:150px; font-family: Arial, Helvetica, sans-serif; font-weight:bolder " class="text-center text-gray-500 " >
           
            4<span class="m-0 text-orange">0</span>3
            
        </div>
        <div class="pt-10 text-2xl font-bold text-center text-gray-500 ">
           Vous n'êtes pas autorisé à acceder à cette page
        </div>  
        <div class="pt-1 text-xs font-bold text-center underline text-myblue ">
            <a href="{{route('welcome')}}">
                revenir à l'accueil
            </a>
        </div>  
      
    </div>
</body>
</html>