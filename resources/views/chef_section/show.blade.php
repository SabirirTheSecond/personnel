<x-layout>

    <x-slot:heading>
        Chef Section
        <x-button href="{{ url('/chef_sections/' )}}">Retour</x-button>

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
        <strong> Nom: </strong> {{$chef->nom}} <strong> Prenom: </strong>{{$chef->prenom}} 

        <strong> Matricule: </strong> {{$chef->matricule}} 
    </p>

    <div>
        <x-button href="{{ url('/chef_sections/' .$chef->id. '/edit')}}">Edit</x-button>
        <x-button href="{{ url('/chef_sections/' .$chef->id. '/demande/index')}}">Demande</x-button>
        <x-button href="{{ url('/chef_sections/' .$chef->id. '/compte_rendu/index')}}">Compte-rendu</x-button>

    </div>

</x-layout>