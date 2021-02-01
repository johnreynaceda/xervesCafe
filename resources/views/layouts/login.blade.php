<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Xerv's Café</title>
    <link rel="shortcut icon" href="{{ asset('images/blacklogo.png') }}" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @livewireStyles
    <style>
        .material-icons.md-18 {
            font-size: 18px;
        }

        .material-icons.md-24 {
            font-size: 24px;
        }

        .material-icons.md-36 {
            font-size: 34px;
        }

        .material-icons.md-48 {
            font-size: 48px;
        }

    </style>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased overflow-hidden">
   <div class=" h-screen  flex justify-center items-center">
       <img src="{{ asset('images/background1.jpg') }}" class="absolute  w-full" alt="">

       <div class="relative bg-white w-96 h-96 rounded-md shadow-lg mr-5 opacity-95 p-2">
           <div class="border-b-2 border-gray-600">
               <h1 class="text-center text-3xl font-bold">Xerv's Café</h1>
              
           </div>
           <div class="bg-white relative">
            <h1 class="mt-2">Login to your Account</h1>
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
    
           </div>
           <form method="POST" action="{{ route('login') }}" class="mt-8">
            @csrf
              <div class="mb-3">
                  <label for="">Email:</label>
                  <input type="email" id="name" name="email" :value="old('email')" required autofocus class="border border-gray-400 h-10 w-full rounded-md focus:border-gray-500 focus:outline-none px-2">
              </div>
              <div class="mb-3">
                  <label for="">Password:</label>
                  <input type="password" id="password" name="password" required autocomplete="current-password" class="border border-gray-400 h-10 w-full rounded-md focus:border-gray-500 focus:outline-none px-2">
              </div>
              <div class="mb-3">
                 <button type="submit" class="bg-gray-600 p-1 text-white px-4">LOGIN</button>
              </div>
           </form>
       </div>
      
       </div>
   </div>
 
    @livewireScripts
</body>

</html>
