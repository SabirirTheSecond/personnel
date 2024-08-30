<x-layout>

    <x-slot:heading>
        Liste des Comptes-Rendus
       
        <a href="/{{$chef_section_path}}" class="btn btn-light">Retour</a>
    </x-slot:heading>

    {{-- <div >
       
        <form action="{{url('/elements/{id}/demande')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un element..">
        </form>
      </div> --}}
    

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        {{ session('error') }}
    </div>
  @endif
    <div class="space-y-4">
    @foreach ($comptes as $compte)

    <a href="{{ $compte->id}}/show" class="  list-group list-group-flush list-group-horizontal">
    
        <li class="mb-3 list-group-item list-group-item-action 
       list-group-item-light"
        
        ><strong>Compte-rendu</strong>: {{ $compte->titre}} {{ $compte->contenu}}
    
            {{ $compte->date}} 
        
    </li>
    
    </a>
    {{-- <form action="{{ route('demandes.destroy', $compte->id)}}" method="POST" >
        @method('delete')
        @csrf
        
        <button type="submit" class="bg-red text-white-400" >Delete</button>
    </form> --}}
    
    @endforeach

    </div>
    <x-button href="{{url(''.$path.'/create')}}" class="btn btn-secondary">Faire compte-rendu</x-button>
    
    <div>
        {{ $comptes->links('pagination::bootstrap-5') }}
    </div>
</x-layout>