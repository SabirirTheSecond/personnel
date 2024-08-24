<x-layout>
<x-slot:heading>
    Billets
    <x-button href="create">Create Billet</x-button>
</x-slot:heading>



@foreach ($billets as $billet)


<a href="{{$billet->id}}" class=" block px-4 py-6 border border-gray-200 rounded-lg">

    <li><strong>billet de jour</strong>: {{ $billet->date}} <div>
        القوة:{{ $billet->force}}

        الحضور:{{ $billet->presence}} 
        الغياب:{{ $billet->absence}} 
        السبب:{{ $billet->raison}} 
        </div>
    
</li>

</a>
@endforeach
</x-layout>    