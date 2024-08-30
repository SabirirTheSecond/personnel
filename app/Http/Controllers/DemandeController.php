<?php

namespace App\Http\Controllers;

use App\Models\ChefSection;
use App\Models\Demande;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function element_index($id)
    {
        $demandes = Demande::where("element_id",$id)->get();
        $path = 'elements/'.$id. '/demande';
        $element_path = 'elements/'.$id;
    //    dd($demandes);
        return view("elements.demande.index",
        compact('demandes','path','element_path'));
    }

    public function chef_index($id)
    {
        $demandes = Demande::where("chef_section_id",$id)->get();
        $path = 'chef_sections/'.$id. '/demande';
        $chef_section_path = 'chef_sections/'.$id;
    //    dd($path);
        return view("chef_section.demande.index",
            compact('demandes', 'path','chef_section_path'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function element_create($id)
    {
        $element=Element::findOrFail($id);
        return view("elements.demande.create",compact("element"));
    }
    public function chef_create($id)
    {
        $chef=ChefSection::findOrFail($id);
        return view("chef_section.demande.create",compact("chef"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'titre' => 'required|min:3|max:255',
            'contenu' => 'required|min:10',
            'date' => 'required',
            'avis_admin' => 'required'
        ]);

        $demande = new Demande();

        if( request()->__isset('element_id')){

            // $element= Element::findOrFail($request->input('element_id'));
            $demande->titre = $request->titre;
            $demande->contenu = $request->contenu;
            $demande->date = $request->date;
            $demande->dureé = $request->dureé;
            $demande->avis_admin = $request->avis_admin;
            $demande->avis_chef_unité = $request->avis_chef_unité;
            $demande->element_id = $request->element_id;
    
            $demande->save();
            return redirect('/elements/'.$demande->element_id.'/demande/index')->with('success','demande ajouté avec succes');

    
        }
        elseif( request()->__isset('chef_section_id'))
        {
            $demande->titre = $request->titre;
            $demande->contenu = $request->contenu;
            $demande->date = $request->date;
            $demande->dureé = $request->dureé;
            $demande->avis_admin = $request->avis_admin;
            $demande->avis_chef_unité = $request->avis_chef_unité;
            $demande->chef_section_id = $request->chef_section_id;
    
            $demande->save();
    
            return redirect('/chef_sections/'.$demande->chef_section_id.'/demande/index')->with('success','demande ajouté avec succes');
        }
       

    }

    /**
     * Display the specified resource.
     */
    public function element_show( $element_id, $demande_id)
    {
        // $id=    request()->has('demande_id');
        // dd($demande_id);
        $demande= Demande::findOrFail($demande_id);
        // $demande = DB::table('demandes')->where('id', $demande_id)->first();


        // dd($demande);
        return view('elements.demande.show',
        ['demande'=>$demande
        ]);
    }
    public function chef_show( $chef_section_id, $demande_id)
    {
        // dd( $id );
        // dd(request()->query());
        $demande= Demande::findOrFail($demande_id);

        // dd($demande);
        return view('chef_section.demande.show',

        ['demande'=>$demande
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
