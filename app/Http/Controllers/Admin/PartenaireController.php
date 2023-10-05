<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaire=Partenaire::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.partenaire.index')->with('partenaires',$partenaire);
    }

    public function Add()
    {
        return view('admin.page.partenaire.add');
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
        $partenaire=new Partenaire();
        $partenaire->raison_sociale=$request->raison_sociale;
        $partenaire->site=$request->site;
        if (request()->file('logo')!=null) {
            $img=request()->file('logo');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('logo')->storeAs('public/imgs',$imageName);
            $partenaire->logo=$imageName;
        }
        $partenaire->save();

        if ($partenaire) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partenaire=Partenaire::find($id);
        return view('admin.page.partenaire.update')->with('partenaire',$partenaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partenaire=Partenaire::find($id);
        $partenaire->raison_sociale=$request->raison_sociale;
        $partenaire->site=$request->site;
        if (request()->file('logo')!=null) {

            if ($partenaire->logo != null) {
                Storage::delete('public/logos/' .$partenaire->logo);
            }
            $img=request()->file('logo');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('logo')->storeAs('public/imgs',$imageName);
            $partenaire->logo=$imageName;
        }
        $partenaire->save();

        if ($partenaire) {
            return redirect()->route('administration.partenaire')->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partenaire=Partenaire::find($id);
        if ($partenaire->logo != null) {
            Storage::delete('public/logos/' .$partenaire->logo);
        }
        $partenaire->delete();
        if ($partenaire){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
