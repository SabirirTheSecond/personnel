<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ElementController extends BaseController
{
    use AuthorizesRequests;
    // public function __construct() {
    //     $this->authorizeResources(Element::class);
    // }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        
        if(request()->has("search"))
        {
            $search = request("search");

            $element = Element::where("matricule","LIKE","%".$search."%")

            ->orWhere("nom","LIKE","%" .$search. "%")
            ->orWhere("prenom","LIKE","%".$search. "%")
            ->first();
            
            if( $element){

                    return view('elements.show', compact('element'));

               }
               else{
            //    return session()->flash('status','Task failed');
                return redirect('/elements')->with('error','Pas d element avec ce nom ou matricule !');
               }

        }

        $elements= Element::with('chefsection')->latest()->paginate(15);

        return view('elements.index',
        
            [
                'elements'=>$elements
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('elements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate([

            'nom' => 'required | min: 3 | max:30',
            'prenom' => 'required | min: 3 | max:30',
            'date_naissance' => 'required ',
            'matricule' => 'required | min: 10 | max:10 | unique:elements',
            'section' => 'required | min: 1 | max:2 '

        ]);
        
        if( $validated){

        
        $element= new Element();

        $element->nom= $request->nom;
        $element->prenom = $request->prenom;
        $element->date_naissance = $request->date_naissance;
        $element->matricule = $request->matricule;
        $element->section = $request->section;
        $element->situation_familliale = $request->situation_familliale;
        $element->ancien_lieu = $request->ancien_lieu;
        $element->photo = $request->photo;
        $element->vehiculé = $request->vehiculé;
        
        $element->groupe_sanguin = $request->groupe_sanguin;
        $element->arme = $request->arme;

        $element->save();
            
        return redirect('/elements')->with('success','Ajout avec succés');

        }
        else 
         return redirect(route('/elements/create'))->with('error','erreur');
            

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $element= Element::find($id);

    return view('elements.show',
    ['element'=>$element
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $element= Element::find($id);

        return view('elements.edit',
        ['element'=>$element
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $element= Element::find($id);

        // $this->authorize('update', $element);

        $validated= $request->validate([
    
            'nom' => 'required | min: 3 | max:30',
            'prenom' => 'required | min: 3 | max:30',
            'date_naissance' => 'required ',
            'matricule' => ['required ', 'min: 10 ', 'max:10 ', Rule::unique('elements')
                ->ignore($element->id) ],
            'section' => 'required | min: 1 | max:2 '
    
        ]);
    
       
       
        
        $element->nom= $request->nom;
        $element->prenom = $request->prenom;
        $element->date_naissance = $request->date_naissance;
        $element->matricule = $request->matricule;
        $element->section = $request->section;
        $element->situation_familliale = $request->situation_familliale;
        $element->ancien_lieu = $request->ancien_lieu;
        $element->photo = $request->photo;
        $element->vehiculé = $request->vehiculé;
        $element->vehiculé = $request->vehiculé;
        $element->groupe_sanguin = $request->groupe_sanguin;
        $element->arme = $request->arme;
    
        $element->save();
    
        return redirect('elements/' .$element->id )->with('success',' Mise a jour avec succés');
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $element= Element::find($id);
        $this->authorize('delete', $element);
        $element->delete();

        // return view('elements.index')->with('success','Element supprimé');
       return redirect('/elements')->with('success','Element supprimé ');
    }
}
