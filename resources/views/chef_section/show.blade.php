<x-layout>

    <x-slot:heading>
        Chef Section
        <x-button href="{{ url('/chef_sections/' )}}" class="btn btn-light">Retour</x-button>

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
        <th scope="row" >{{$chef->matricule}}</th>
        <td>{{$chef->nom}}</td>
        <td>{{$chef->prenom}}</td>
        <td>{{$chef->date_naissance}}</td>
        <td>{{$chef->section}}</td>
        <td>{{$chef->situation_familliale}}</td>
        <td>{{$chef->vehiculé}}</td>
        <td>{{$chef->groupe_sanguin}}</td>
        <td>{{$chef->arme}}</td>
        <td>{{$chef->ancien_lieu}}</td>
      </tr>
     
      
    </tbody>
  </table>
    {{-- <p>
        <strong> Nom: </strong> {{$chef->nom}} <strong> Prenom: </strong>{{$chef->prenom}} 

        <strong> Matricule: </strong> {{$chef->matricule}} 
    </p> --}}

    <div>
        <x-button href="{{ url('/chef_sections/' .$chef->id. '/edit')}}" class="btn btn-light">Edit</x-button>
        <x-button href="{{ url('/chef_sections/' .$chef->id. '/demande/index')}}" class="btn btn-light">Demande</x-button>
        <x-button href="{{ url('/chef_sections/' .$chef->id. '/compte_rendu/index')}}" class="btn btn-light">Compte-rendu</x-button>

    </div>

</x-layout>