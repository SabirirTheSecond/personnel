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


  <table class="table">
    <thead >
      <tr>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Date</th>
        
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row" >{{$demande->titre}} </th>
        <td>{{$demande->contenu}}</td>
        <td>{{$demande->date}}</td>
       
      </tr>
     
      
    </tbody>
  </table>
    <div>
        {{-- <x-button href="{{ url('/chef_sections/' .$chef->id. '/edit')}}">Edit</x-button> --}}
        <x-button href="index" class="btn btn-light">Retour</x-button>
        
    </div>

</x-layout>