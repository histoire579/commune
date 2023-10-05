<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thematique;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thematique=Thematique::all();
        return view('admin.page.theme.index')->with('themes',$thematique);
    }

    public function Add()
    {
        return view('admin.page.theme.add');
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
        $slug=Str::slug($request->titre);
        $thematique=new Thematique();
        $thematique->titre=$request->titre;
        $thematique->slug=$slug;
        $thematique->save();
        if ($thematique) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function show(Thematique $thematique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thematique=Thematique::find($id);
        return view('admin.page.theme.update')->with('theme',$thematique);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->titre);
        $thematique=Thematique::find($id);
        $thematique->titre=$request->titre;
        $thematique->slug=$slug;
        $thematique->save();
        if ($thematique) {
            return redirect()->route('administration.thematique')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thematique=Thematique::find($id);
        
        $thematique->delete();
        if ($thematique){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
