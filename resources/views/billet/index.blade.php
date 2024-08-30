<x-layout>
<x-slot:heading>
    Billets
    <x-button href="create" class="btn btn-light">Creer Billet</x-button>
</x-slot:heading>



@foreach ($billets as $billet)


<a href="{{$billet->id}}" class="  list-group list-group-flush list-group-horizontal">



    <li class="mb-3 list-group-item list-group-item-action 
       list-group-item-light "
    ><strong>billet de jour</strong>: {{ $billet->date}} 
        القوة:{{ $billet->force}}

        الحضور:{{ $billet->presence}} 
        الغياب:{{ $billet->absence}} 
        السبب:{{ $billet->raison}} 
        
    
</li>

</a>
@endforeach

{{ $billets->links('pagination::bootstrap-5')}}
</x-layout>    