<?php

namespace App\Http\Controllers;

use App\Models\ChefSection;
use App\Models\CompteRendu;
use App\Models\Element;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompteRenduController extends BaseController
{
    use AuthorizesRequests;
    
    /**
     * Display a listing of the resource.
     */
    public function element_index($id)
    {
        $comptes = CompteRendu::where("element_id",$id)->get();
        $path = 'elements/'.$id. '/compte_rendu';
    //    dd($demandes);
        return view("elements.compte_rendu.index",
        compact('comptes','path'));
    }

    public function chef_index($id)
    {
        $comptes = CompteRendu::where("chef_section_id",$id)->get();
        $path = 'chef_sections/'.$id. '/compte_rendu';
    //    dd($path);
        return view("chef_section.compte_rendu.index",
            compact('comptes', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function element_create($id)
    {
        $element=Element::findOrFail($id);
        return view("elements.compte_rendu.create",compact("element"));
    }
    public function chef_create($id)
    {
        $chef=ChefSection::findOrFail($id);
        return view("chef_section.compte_rendu.create",compact("chef"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         request()->validate([
            'titre' => 'required|min:3|max:255',
            'contenu' => 'required|min:10',
            'date' => 'required',
            'avis_admin' => 'required'
        ]);

        $demande = new CompteRendu();

        if( request()->__isset('element_id')){

            // $element= Element::findOrFail($request->input('element_id'));
            $demande->titre = $request->titre;
            $demande->contenu = $request->contenu;
            $demande->date = $request->date;
           
            $demande->avis_admin = $request->avis_admin;
            $demande->avis_chef_unité = $request->avis_chef_unité;
            $demande->element_id = $request->element_id;
    
            $demande->save();
            return redirect('/elements')->with('success','demande ajouté avec succes');

    
        }
        elseif( request()->__isset('chef_section_id'))
        {
            $demande->titre = $request->titre;
            $demande->contenu = $request->contenu;
            $demande->date = $request->date;
            
            $demande->avis_admin = $request->avis_admin;
            $demande->avis_chef_unité = $request->avis_chef_unité;
            $demande->chef_section_id = $request->chef_section_id;
    
            $demande->save();
    
            return redirect('/chef_sections')->with('success','demande ajouté avec succes');
        }
       

    }

    /**
     * Display the specified resource.
     */
    public function element_show( $element_id, $demande_id)
    {
        // $id=    request()->has('demande_id');
        // dd($demande_id);
        $compte= CompteRendu::findOrFail($demande_id);
        // $demande = DB::table('demandes')->where('id', $demande_id)->first();


        // dd($demande);
        return view('elements.compte_rendu.show',
        ['compte'=>$compte
        ]);
    }
    public function chef_show( $chef_section_id, $demande_id)
    {
        // dd( $id );
        // dd(request()->query());
        $compte= CompteRendu::findOrFail($demande_id);

        // dd($demande);
        return view('chef_section.compte_rendu.show',

        ['compte'=>$compte
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompteRendu $compteRendu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompteRendu $compteRendu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $compte = CompteRendu::findOrFail($id);
        
        $this->authorize('delete',$compte);

        $compte->delete();
    }
}
