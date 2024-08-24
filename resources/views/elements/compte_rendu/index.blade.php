<x-layout>

    <x-slot:heading>
        Comptes-Rendus
    </x-slot:heading>

    {{-- <div >
       
        <form action="{{url('/elements/{id}/demande')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un element..">
        </form>
      </div> --}}
    <h1 class="text-black-500 mb-2">Liste des comptes rendus:</h1>

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

    <a href="{{ $compte->id}}/show" class=" block px-4 py-6 border border-gray-200 rounded-lg">
    
        <li><strong>Compte-rendu</strong>: {{ $compte->titre}} {{ $compte->contenu}}
    
            {{ $compte->date}} 
        
    </li>
    
    </a>
    <form action="{{ route('elements.destroy', $compte->id)}}" method="POST">
        @method('delete')
        @csrf
        
        <button type="submit" class="bg-red text-white-400" >Delete</button>
    </form>
    @endforeach

    </div>
    <x-button href="{{url(''.$path.'/create')}}">Faire compte-rendu</x-button>

    <div>
        {{-- {{ $demandes->links() }} --}}
    </div>
</x-layout>