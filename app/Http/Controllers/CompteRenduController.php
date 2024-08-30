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
        $comptes = CompteRendu::where("element_id",$id)->latest()->paginate(15);
        $path = 'elements/'.$id. '/compte_rendu';
        $element_path = 'elements/'.$id;
        //    dd($comptes);

        return view("elements.compte_rendu.index",
        compact('comptes','path','element_path'));
    }

    public function chef_index($id)
    {
        $comptes = CompteRendu::where("chef_section_id",$id)->latest()->paginate(15);
        $path = 'chef_sections/'.$id. '/compte_rendu';
        $chef_section_path= 'chef_sections/'.$id;
    //    dd($path);
        return view("chef_section.compte_rendu.index",
            compact('comptes', 'path','chef_section_path'));
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

        $compte = new CompteRendu();

        if( request()->__isset('element_id')){

            // $element= Element::findOrFail($request->input('element_id'));
            $compte->titre = $request->titre;
            $compte->contenu = $request->contenu;
            $compte->date = $request->date;
           
            $compte->avis_admin = $request->avis_admin;
            $compte->avis_chef_unité = $request->avis_chef_unité;
            $compte->element_id = $request->element_id;
    
            $compte->save();
            return redirect('/elements/'.$compte->element_id.'/compte_rendu/index')->with('success','Compte-Rendu ajouté avec succes');

    
        }
        elseif( request()->__isset('chef_section_id'))
        {
            $compte->titre = $request->titre;
            $compte->contenu = $request->contenu;
            $compte->date = $request->date;
            
            $compte->avis_admin = $request->avis_admin;
            $compte->avis_chef_unité = $request->avis_chef_unité;
            $compte->chef_section_id = $request->chef_section_id;
    
            $compte->save();
    
            return redirect('/chef_sections/'.$compte->chef_section_id.'/compte_rendu/index')->with('success','Compte-Rendu ajouté avec succes');
        }
       

    

    }

    /**
     * Display the specified resource.
     */
    public function element_show( $element_id, $compte_id)
    {
        // $id=    request()->has('compte_id');
        // dd($compte_id);
        $compte= CompteRendu::findOrFail($compte_id);
        // $compte = DB::table('comptes')->where('id', $compte_id)->first();


        // dd($compte);
        return view('elements.compte_rendu.show',
        ['compte'=>$compte
        ]);
    }
    public function chef_show( $chef_section_id, $compte_id)
    {
        // dd( $id );
        // dd(request()->query());
        $compte= CompteRendu::findOrFail($compte_id);

        // dd($compte);
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
    public function chef_destroy($chef_id, $id)
    {
        $compte = CompteRendu::findOrFail($id);
        
        $chef= $compte->chef_section_id;
        $this->authorize('delete',$compte);

        $compte->delete();
        return redirect('chef_sections/'. $chef. '/compte_rendu/index')->with('success','Compte-Rendu supprimé');
    }
}
