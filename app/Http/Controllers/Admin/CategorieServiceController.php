<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieService=CategorieService::all();
        return view('admin.page.categorieService.index')->with('categories',$categorieService);
    }

    public function Add()
    {
        return view('admin.page.categorieService.add');
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
        $categorieService=new CategorieService();
        $categorieService->titre=$request->titre;
        $categorieService->slug=$slug;
        $categorieService->save();
        if ($categorieService) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieService  $categorieService
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieService $categorieService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieService  $categorieService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorieService=CategorieService::find($id);
        return view('admin.page.categorieService.update')->with('categorie',$categorieService);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieService  $categorieService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->titre);
        $categorieService=CategorieService::find($id);
        $categorieService->titre=$request->titre;
        $categorieService->slug=$slug;
        $categorieService->save();
        if ($categorieService) {
            return redirect()->route('administration.categorie.service')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieService  $categorieService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorieService=CategorieService::find($id);
        
        $categorieService->delete();
        if ($categorieService){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
