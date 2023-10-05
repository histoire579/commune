<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategorieActeur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieActeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieActeur=CategorieActeur::all();
        return view('admin.page.categorieActeur.index')->with('categories',$categorieActeur);
    }

    public function Add()
    {
        return view('admin.page.categorieActeur.add');
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
        $categorieActeur=new CategorieActeur();
        $categorieActeur->titre=$request->titre;
        $categorieActeur->slug=$slug;
        $categorieActeur->save();
        if ($categorieActeur) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieActeur  $categorieActeur
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieActeur $categorieActeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieActeur  $categorieActeur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorieActeur=CategorieActeur::find($id);
        return view('admin.page.categorieActeur.update')->with('categorie',$categorieActeur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieActeur  $categorieActeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->titre);
        $categorieActeur=CategorieActeur::find($id);
        $categorieActeur->titre=$request->titre;
        $categorieActeur->slug=$slug;
        $categorieActeur->save();
        if ($categorieActeur) {
            return redirect()->route('administration.categorie.acteur')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieActeur  $categorieActeur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorieActeur=CategorieActeur::find($id);
        
        $categorieActeur->delete();
        if ($categorieActeur){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
