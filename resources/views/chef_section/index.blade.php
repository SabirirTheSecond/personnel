<x-layout>

    <x-slot:heading class="flex ">
        Liste Des Chefs Sections
        <x-button href="/chef_sections/create" class="btn btn-light">Ajouter chef section</x-button>

    </x-slot:heading>
    
    <div >
       
        <form action="{{url('/chef_sections')}}" method="GET">
            <input type="text"  name="search" placeholder="chercher un chef section..">
        </form>
      </div>
    @if(session('success'))
    <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div id="flash-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        {{ session('error') }}
    </div>
  @endif
  
    <div class="space-y-4">
    
        @foreach ($chefs_section as $chef)
    
        <a href="chef_sections/{{$chef->id}}" class=" list-group list-group-flush list-group-horizontal">
        
            <li class="list-group-item list-group-item-action
            list-group-item-light"><strong>chef</strong>: {{ $chef->nom}} {{ $chef->prenom}}
        
                {{ $chef->matricule}} 

                
                <form action="{{ route('chef_sections.destroy', $chef->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger bg-red-300 text-white-400 border border-black-700 rounded ">Delete</button>
                    {{-- <button type="submit" class="block bg-red">Delete</button> --}}
                </form>
        </li>
        
        </a>
        
        
        @endforeach
    
        </div>
    <div>
        {{ $chefs_section->links('pagination::bootstrap-5') }}
    </div>
</x-layout>