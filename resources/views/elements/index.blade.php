<x-layout>

    <x-slot:heading class="flex"> 
        Elements
        <x-button href="/elements/create" class="flex-1">Ajouter Element</x-button>

    </x-slot:heading>

    <div >
       
        <form action="{{url('/elements')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un element..">
        </form>
      </div>
    <h1 class="text-black-500 mb-2">Liste des elements:</h1>

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
    @foreach ($elements as $element)

    <a href="elements/{{$element->id}}" class=" block px-4 py-6 border border-gray-200 rounded-lg">
    
        <li><strong>element</strong>: {{ $element->nom}} {{ $element->prenom}}
    
            {{ $element->matricule}} 
            <form action="{{ route('elements.destroy', $element->id)}}" method="POST">
                @method('delete')
                @csrf
                
                <button type="submit" class="bg-red-300 text-white-400 border border-black-700 rounded " >Delete</button>
            </form>
    </li>
    
    </a>
    
    @endforeach

    </div>

    <div>
        {{ $elements->links() }}
    </div>
</x-layout>