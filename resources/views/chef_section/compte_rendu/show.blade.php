<x-layout>

    <x-slot:heading>
        Compte-Rendu 
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
        <strong> Titre: </strong> {{$compte->titre}} <strong> Contenu: </strong>{{$compte->contenu}} 

        <strong> Date: </strong> {{$compte->date}} 
    </p>

    <div>
        {{-- <x-button href="{{ url('/chef_sections/' .$chef->id. '/edit')}}">Edit</x-button> --}}
        <x-button href="/chef_sections/{{$compte->chef_section_id}}/compte_rendu/index">Retour</x-button>
    </div>

</x-layout>