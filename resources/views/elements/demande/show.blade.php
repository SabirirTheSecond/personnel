<x-layout>

    <x-slot:heading>
        demande
    </x-slot:heading>
   
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif


    <p>
        <strong> Titre: </strong> {{$demande->titre}} <strong> Contenu: </strong>{{$demande->contenu}} 

        <strong> Date: </strong> {{$demande->date}} 
    </p>

    <div>
        {{-- <x-button href="{{ url('/chef_sections/' .$chef->id. '/edit')}}">Edit</x-button> --}}
        <x-button href="index">Retour</x-button>
        
    </div>

</x-layout>