<x-layout>

    <x-slot:heading>
        Billet
        <x-button href="index" class="btn btn-light">Retour</x-button>
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

  <table class="table">
    <thead >
      <tr>
        <th scope="col">Date</th>
        <th scope="col">القوة</th>
        <th scope="col">الحضور</th>
        <th scope="col">الغياب</th>
        <th scope="col">السبب</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row" >{{$billet->date}}</th>
        <td>{{$billet->force}}</td>
        <td>{{$billet->presence}}</td>
        <td>{{$billet->absence}}</td>
        <td>{{$billet->raison}}</td>
        
        
      </tr>
     
      
    </tbody>
  </table>
    
  

    
    
    
        <span><form action={{ route('billets.destroy', $billet->id)}} method="POST">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger ">Delete</button>
        </form>
            </span>    
    
        

    

</x-layout>