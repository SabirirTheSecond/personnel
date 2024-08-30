<x-layout>

    <x-slot:heading>
        Demeandes 
        <a href="/{{$element_path}}" class="btn btn-light">Retour</a>
    </x-slot:heading>

    
    

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

    
    <a href="{{ $demande->id}}" class="  list-group list-group-flush list-group-horizontal">
    
        <li class="mb-3 list-group-item list-group-item-action 
       list-group-item-light">
            <strong>demande</strong>: {{ $demande->titre}} {{ $demande->contenu}}
    
            {{ $demande->date}} 
        
    </li>
    
    </a>
    
    
    @endforeach
    </div>

    <x-button href="{{url(''.$path.'/create')}}" class="btn btn-secondary">Faire demande</x-button>
    {{-- <div> --}}
        {{-- {{ $demandes->links() }} --}}
    {{-- </div> --}}
</x-layout>