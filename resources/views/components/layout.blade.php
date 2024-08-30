<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>

        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ url('css/style.css') }}"> --}}
        
        <script>
            $(document).ready(function() {
                // Flash message will fade out after 5 seconds
                setTimeout(function() {
                    $('#flash-message').fadeOut('slow');
                }, 3000); // 5000ms = 5 seconds
            });
        </script>
    </head>
   <body >
    

    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
      
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/billets/index" :active="request()->is('billets')">Billets</x-nav-link>
                <x-nav-link href="/elements" :active="request()->is('jobs')">Elements</x-nav-link>
                <x-nav-link href="/chef_sections" :active="request()->is('contact')">Chefs Sections</x-nav-link>

    </nav>      --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <x-nav-link href="/" :active="request()->is('/')" class="navbar-brand">Home</x-nav-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <x-nav-link class="nav-link"
              href="/billets/index" :active="request()->is('billets')">Billets</x-nav-link>

            </li>
            <li class="nav-item">
              <x-nav-link class="nav-link"
               href="/elements" :active="request()->is('elements')">Elements</x-nav-link>

            </li>
            <li class="nav-item">
              <x-nav-link class="nav-link"
               href="/chef_sections" :active="request()->is('chef_sections')">Chefs Section</x-nav-link>

            </li>
            
            
          </ul>
         
        </div>
      </div>
    </nav>
          
             
             
  
               
           
    
  
    <header >

      <div >
        
        <h1 >{{$heading}}</h1>
       
      </div>
      
    </header>
    <main>
      <div >
        {{ $slot}}
      </div>
    </main>
  </div>
  
    
    
       
       
    </body>
</html>