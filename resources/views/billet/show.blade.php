<x-layout>

    <x-slot:heading>
        Billet
    </x-slot:heading>
   
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
  @endif
  
  @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

    <p>
        <strong> Date: </strong> {{$billet->date}} <strong> القوة: </strong>{{$billet->force}} 

        <strong> الحضور: </strong> {{$billet->presence}} 
        <strong> الغياب: </strong> {{$billet->absence}}
        <strong> السبب: </strong> {{$billet->raison}}
        
    </p>

    <div>
        <x-button href="{{$billet->id. '/edit'}}">Edit</x-button>
        
        <x-button href="index">Retour</x-button>
        <form action={{ route('billets.destroy', $billet->id)}} method="POST">
            @csrf
            @method('DELETE')
        <button type="submit">Delete</button>
        </form>

    </div>

</x-layout>