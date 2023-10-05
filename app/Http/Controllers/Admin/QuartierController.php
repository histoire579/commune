<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quartier;
use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuartierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quartier=Quartier::orderBy('created_at','desc')->paginate(25);
        return view('admin.page.quartier.index')->with('quartiers',$quartier);
    }

    public function Add()
    {
        $commune=Commune::all();
        return view('admin.page.quartier.add')->with('communes',$commune);
    }

    public function Search(Request $request)
    {
        $quartier=Quartier::where('nom','like','%' .$request->nom. '%')               
                    ->paginate(25);
        return view('admin.page.quartier.index')->with('quartiers',$quartier); 
    }

    public function getQuartierByCommune(Request $request)
    {
        $quartiers=Quartier::where('com_id',$request->com_id)->get();
        return response()->json($quartiers);
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
        $slug=Str::slug($request->nom);
        $quartier=new Quartier();
        $quartier->nom=$request->nom;
        $quartier->slug=$slug;
        $quartier->com_id=$request->com_id;
        $quartier->save();
        if ($quartier) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function show(Quartier $quartier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quartier=Quartier::find($id);
        $commune=Commune::all();
        return view('admin.page.quartier.update')->with('quartier',$quartier)->with('communes',$commune);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->nom);
        $quartier=Quartier::find($id);
        $quartier->nom=$request->nom;
        $quartier->slug=$slug;
        $quartier->com_id=$request->com_id;
        $quartier->save();
        if ($quartier) {
            return redirect()->route('administration.quartier')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quartier=Quartier::find($id);
        
        $quartier->delete();
        if ($quartier){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
