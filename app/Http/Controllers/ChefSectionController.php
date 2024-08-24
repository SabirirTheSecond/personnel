<?php

namespace App\Http\Controllers;

use App\Models\ChefSection;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChefSectionController extends BaseController
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       if(request()->has("search"))
                {
                   $chef=ChefSection::where("matricule","LIKE","%".request("search")."%")
                   ->orWhere("nom","LIKE","%".request("search")."%")
                   ->orWhere("prenom","LIKE","%".request("search")."%")
                   ->first();
                  
                   if( $chef){
                    return 
                    view('chef_section.show',[
                  
                    'chef' => $chef
                  
                    ]);
                   }
                   else{
                //    return session()->flash('status','Task failed');
                    return redirect('/chef_sections')->with('error','Pas d element avec ce nom ou matricule !');
                   }
                   

                }
               
       
        $chefs_section= ChefSection::with('elements')->latest()->paginate();
        
        return view('chef_section.index',[
        
        'chefs_section'=> $chefs_section
    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chef_section.create');
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
            'matricule' => 'required | min: 10 | max:10 | unique:chef_sections',
            'section' => 'required | min: 1 | max:2 '

        ]);
        
        if( $validated){

        
        $chef= new ChefSection();

        $chef->nom= $request->nom;
        $chef->prenom = $request->prenom;
        $chef->date_naissance = $request->date_naissance;
        $chef->matricule = $request->matricule;
        $chef->section = $request->section;
        $chef->situation_familliale = $request->situation_familliale;
        $chef->ancien_lieu = $request->ancien_lieu;
        $chef->photo = $request->photo;
        $chef->vehiculé = $request->vehiculé;
        
        $chef->groupe_sanguin = $request->groupe_sanguin;
        $chef->arme = $request->arme;

        $chef->save();
            
        return redirect('/chef_sections')->with('success','Ajout avec succés');

        }
        else 
         return redirect('/chef_sections/create')->with('error','ajout echoué');
            

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $chef= ChefSection::find($id);

    return view('chef_section.show',[
        
        'chef'=> $chef
    
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chef= ChefSection::find($id);

    return view('chef_section.edit',[
        
        'chef'=> $chef
    
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $chef= ChefSection::find($id);
    $validated= $request->validate([

        'nom' => 'required | min: 3 | max:30',
        'prenom' => 'required | min: 3 | max:30',
        'date_naissance' => 'required ',
        'matricule' => ['required ', 'min: 10 ', 'max:10 ', Rule::unique('chef_sections')
            ->ignore($chef->id) ],
        'section' => 'required | min: 1 | max:2 '

    ]);

   
   
    
    $chef->nom= $request->nom;
    $chef->prenom = $request->prenom;
    $chef->date_naissance = $request->date_naissance;
    $chef->matricule = $request->matricule;
    $chef->section = $request->section;
    $chef->situation_familliale = $request->situation_familliale;
    $chef->ancien_lieu = $request->ancien_lieu;
    $chef->photo = $request->photo;
    $chef->vehiculé = $request->vehiculé;
    $chef->vehiculé = $request->vehiculé;
    $chef->groupe_sanguin = $request->groupe_sanguin;
    $chef->arme = $request->arme;

    $chef->save();

    return redirect('chef_sections/' .$chef->id )->with('success',' Mise a jour avec succés');


}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $chef = ChefSection::find($id);

        $this->authorize('delete', $chef);

        $chef->delete();

        return redirect('/chef_sections')->with('success','Chef section supprimé ');
    }
}
