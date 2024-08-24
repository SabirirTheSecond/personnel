<x-layout>

    <x-slot:heading>
        Demeandes 
    </x-slot:heading>

    {{-- <div >
       
        <form action="{{url('/elements/{id}/demande')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un element..">
        </form>
      </div> --}}
    <h1 class="text-black-500 mb-2">Liste des demandes:</h1>

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
    @foreach ($demandes as $demande)

    
    <a href="{{$demande->id}}" class=" block px-4 py-6 border border-gray-200 rounded-lg">
    
        <li><strong>demande</strong>: {{ $demande->titre}} {{ $demande->contenu}}
            demande_id: {{ $demande->id}}
            {{ $demande->date}} 
        
    </li>
    
    {{-- </a> --}}
    
    
    @endforeach
    </div>

    <x-button href="{{url(''.$path.'/create')}}">Faire demande</x-button>
    {{-- <div> --}}
        {{-- {{ $demandes->links() }} --}}
    {{-- </div> --}}
</x-layout>