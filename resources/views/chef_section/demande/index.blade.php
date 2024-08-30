<x-layout>

    <x-slot:heading>
        Demandes
        {{-- <x-button href="/chef_sections" class="btn btn-light">Retour</x-button> --}}
    </x-slot:heading>

    {{-- <div >
       
        <form action="{{url('/elements/{id}/demande')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un element..">
        </form>
      </div> --}}
    

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
{{-- <form action="{{ route('elements.destroy', $demande->id)}}" method="POST">
        @method('delete')
        @csrf
        
        <button type="submit" class="btn btn-danger" >Delete</button>
    </form> --}}
    </div>
    <x-button href="{{url(''.$path.'/create')}}" class="btn btn-secondary">Faire demande</x-button>
    <a href="/{{$chef_section_path}}" class="btn btn-light">Retour</a>
    <div>
        {{-- {{ $demandes->links() }} --}}
    </div>
</x-layout>