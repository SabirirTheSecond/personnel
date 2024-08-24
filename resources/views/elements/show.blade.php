<x-layout>

    <x-slot:heading>
        Element
        <x-button href="{{ url('/elements/') }} ">Retour</x-button>

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
        <strong> Nom: </strong> {{$element->nom}} <strong> Prenom: </strong>{{$element->prenom}} 

        <strong> Matricule: </strong> {{$element->matricule}} 

        {{ $element->photo}}
    </p>

    <div>
        <x-button href="{{ url('/elements/' .$element->id. '/edit') }} ">Edit</x-button>
        <x-button href="{{ url('/elements/' .$element->id. '/demande/index')}}">Demande</x-button>
        <x-button href="{{ url('/elements/' .$element->id. '/compte_rendu/index')}}">Compte-rendu</x-button>

    </div>

</x-layout>