<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appreciation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppreciationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appreciation=Appreciation::all();
        return view('admin.page.appreciation.index')->with('appreciations',$appreciation);
    }

    public function Add()
    {
        return view('admin.page.appreciation.add');
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
        $appreciation=new Appreciation();
        $appreciation->titre=$request->titre;
        $appreciation->slug=$slug;
        $appreciation->save();
        if ($appreciation) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appreciation  $appreciation
     * @return \Illuminate\Http\Response
     */
    public function show(Appreciation $appreciation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appreciation  $appreciation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appreciation=Appreciation::find($id);
        return view('admin.page.appreciation.update')->with('appreciation',$appreciation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appreciation  $appreciation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->titre);
        $appreciation=Appreciation::find($id);
        $appreciation->titre=$request->titre;
        $appreciation->slug=$slug;
        $appreciation->save();
        if ($appreciation) {
            return redirect()->route('administration.appreciation')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appreciation  $appreciation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appreciation=Appreciation::find($id);
        
        $appreciation->delete();
        if ($appreciation){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
