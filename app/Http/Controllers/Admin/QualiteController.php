<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualite;
use App\Models\Thematique;
use App\Models\Service;
use App\Models\Appreciation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualite=Qualite::with('service','theme','appreciation')->orderBy('created_at','desc')->paginate(25);
        return view('admin.page.qualite.index')->with('qualites',$qualite);
    }

    public function Add()
    {
        $theme=Thematique::all();
        $appreciation=Appreciation::orderBy('titre','asc')->get();
        $service=Service::orderBy('nom','asc')->get();
        return view('admin.page.qualite.add')->with('themes',$theme)->with('services',$service)->with('appreciations',$appreciation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qualite=new Qualite();
        $qualite->moyenne=$request->moyenne;
        $qualite->moyenneAcceptable=$request->moyenneAcceptable;
        $qualite->service_id=$request->service_id;
        $qualite->theme_id=$request->theme_id;
        $qualite->app_id=$request->app_id;
        $thematique=Thematique::find($request->theme_id);
        $qualite->slug_app=$thematique->slug;
        $qualite->save();
        if ($qualite) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function show(Qualite $qualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qualite=Qualite::find($id);
        $theme=Thematique::all();
        $appreciation=Appreciation::orderBy('titre','asc')->get();
        $service=Service::orderBy('nom','asc')->get();
        return view('admin.page.qualite.update')->with('qualite',$qualite)->with('themes',$theme)->with('services',$service)
                                                    ->with('appreciations',$appreciation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qualite=Qualite::find($id);
        $qualite->moyenne=$request->moyenne;
        $qualite->moyenneAcceptable=$request->moyenneAcceptable;
        $qualite->service_id=$request->service_id;
        $qualite->theme_id=$request->theme_id;
        $qualite->app_id=$request->app_id;
        $thematique=Thematique::find($request->theme_id);
        $qualite->slug_app=$thematique->slug;
        $qualite->save();
        if ($qualite) {
            return redirect()->route('administration.qualite')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualite=Qualite::find($id);
        
        $qualite->delete();
        if ($qualite){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
