<x-layout>

    <x-slot:heading>
        Comptes-Rendus
        <a href="/{{$element_path}}" class="btn btn-light">Retour</a>
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
    <div class="space-y-4">
    @foreach ($comptes as $compte)

    <a href="{{ $compte->id}}/show" class=" list-group list-group-flush list-group-horizontal">
    
        <li class="mb-3 list-group-item list-group-item-action 
       list-group-item-light"
        ><strong>Compte-rendu</strong>: {{ $compte->titre}} {{ $compte->contenu}}
    
            {{ $compte->date}} 
        
            <form action="{{ route('elements.destroy', $compte->id)}}" method="POST">
                @method('delete')
                @csrf
                
                <button type="submit" class="btn btn-danger" >Delete</button>
            </form>
    </li>
    
    </a>
    
    @endforeach

    </div>
    <x-button href="{{url(''.$path.'/create')}}" class="btn btn-light">Faire compte-rendu</x-button>
    
    <div>
        {{-- {{ $demandes->links() }} --}}
    </div>
</x-layout>