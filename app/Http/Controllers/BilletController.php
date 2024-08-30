<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BilletController extends BaseController
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billets= Billet::latest()->paginate(10);

        
        return view("billet.index",compact("billets"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("billet.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = request()->validate([
            "date" => 'date|required',
            'force' => 'integer|required',
            'presence'=> 'integer|required',
            'absence' => 'string|required',
            'raison' => 'string|required'
        ]);

        if($validated) {
            $billet = new Billet();
            $billet->date = $request->date;
            $billet->force= $request->force;
            $billet->presence= $request->presence;
            $billet->absence= $request->absence;
            $billet->raison= $request->raison;
    
            $billet->save();
            return redirect('billets/index')->with('success','Billet ajouté !');
        }
        else{
            return redirect('billets/create')->with('error','Ajout echoué ');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $billet = Billet::findOrFail($id);
        return view('billet.show',compact('billet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $billet= Billet::find($id);

        return view('billet.edit',
        ['billet'=>$billet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $billet= Billet::findOrFail($id);

        $this->authorize('update', $billet);

        // $validated = request()->validate([
        //     "date" => 'date|required',
        //     'force' => 'integer|required',
        //     'presence'=> 'integer|required',
        //     'absence' => 'string|required',
        //     'raison' => 'string|required'
        // ]);
    
       
       
        // if($validated){
            $billet->date = $request->date;
            $billet->force= $request->force;
            $billet->presence= $request->presence;
            $billet->absence= $request->absence;
            $billet->raison= $request->raison;
        
       
    
        $billet->save();
    
        return redirect('billets/' .$billet->id )->with('success',' Mise a jour avec succés');
        // }
        // else{
        //     return redirect('billets/')->with('error','Ajout echoué ');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $billet= Billet::findOrFail($id);
// dd($billet);
        $this->authorize('delete', $billet);

        $billet->delete();

        return redirect('billets/index')->with('success','Billet supprimé');
    }
}
