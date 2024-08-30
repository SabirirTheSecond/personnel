<x-layout>

    <x-slot:heading>
        Compte-Rendu 
        <x-button href="/chef_sections/{{$compte->chef_section_id}}/compte_rendu/index"
            class="btn btn-light">Retour</x-button>
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
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Date</th>
        
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row" >{{$compte->titre}} </th>
        <td>{{$compte->contenu}}</td>
        <td>{{$compte->date}}</td>
       
      </tr>
     
      
    </tbody>
  </table>
  {{-- route('comptes.destroy', $compte->id,$compte->chef_section_id) --}}
  <form action="{{ route('comptes.destroy',['compte_rendu_id'=>$compte->id,'chef_section_id'=>
                                                $compte->chef_section_id ]) }}"
         method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger bg-red-300 text-white-400 border border-black-700 rounded ">Delete</button>
    {{-- <button type="submit" class="block bg-red">Delete</button> --}}
</form>

    <div>
        {{-- <x-button href="{{ url('/chef_sections/' .$chef->id. '/edit')}}">Edit</x-button> --}}
        
    </div>

</x-layout>