<x-layout>

    <x-slot:heading>
        Element
        <x-button href="{{ url('/elements/') }} " class="btn btn-light">Retour</x-button>

    </x-slot:heading>
   
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  <table class="table">
    <thead >
      <tr>
        <th scope="col">Matricule</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Date naissance</th>
        <th scope="col">Section</th>
        <th scope="col">Situation</th>
        <th scope="col">Vehiculé</th>
        <th scope="col">Groupage</th>
        <th scope="col">Arme</th>
        <th scope="col">Ancien Lieu</th>

        

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row" >{{$element->matricule}}</th>
        <td>{{$element->nom}}</td>
        <td>{{$element->prenom}}</td>
        <td>{{$element->date_naissance}}</td>
        <td>{{$element->section}}</td>
        <td>{{$element->situation_familliale}}</td>
        <td>{{$element->vehiculé}}</td>
        <td>{{$element->groupe_sanguin}}</td>
        <td>{{$element->arme}}</td>
        <td>{{$element->ancien_lieu}}</td>
      </tr>
     
      
    </tbody>
  </table>
    <p>


        {{-- <strong> Nom: </strong> {{$element->nom}} <strong> Prenom: </strong>{{$element->prenom}} 

        <strong> Matricule: </strong> {{$element->matricule}} 

        {{ $element->photo}} --}}
    </p>

    <div>
        <x-button href="{{ url('/elements/' .$element->id. '/edit') }} " class="btn btn-light">Edit</x-button>
        <x-button href="{{ url('/elements/' .$element->id. '/demande/index')}}" class="btn btn-light">Demande</x-button>
        <x-button href="{{ url('/elements/' .$element->id. '/compte_rendu/index')}}" class="btn btn-light">Compte-rendu</x-button>

    </div>

</x-layout>