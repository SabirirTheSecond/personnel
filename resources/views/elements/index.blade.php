<x-layout>

    <x-slot:heading class="flex"> 
        Elements
        <x-button href="/elements/create" class="btn btn-light">Ajouter Element</x-button>

    </x-slot:heading>

    <div >
       
        <form action="{{url('/elements')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un element..">
        </form>
      </div>
    

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
    @foreach ($elements as $element)

    <a href="elements/{{$element->id}}" class="list-group list-group-flush list-group-horizontal ">
    
        <li class="mb-3 list-group-item list-group-item-action 
       list-group-item-light"><strong>element</strong>: {{ $element->nom}} {{ $element->prenom}}
    
            {{ $element->matricule}} 
            <form action="{{ route('elements.destroy', $element->id)}}" method="POST">
                @method('delete')
                @csrf
                
                <button type="submit" class="btn btn-danger " >Delete</button>
            </form>
    </li>
    
    </a>
    
    @endforeach

    </div>

    <div>
        {{ $elements->links('pagination::bootstrap-5') }}
    </div>
</x-layout>