<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acteur;
use App\Models\Commune;
use App\Models\Quartier;
use App\Models\CategorieActeur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ActeurController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acteur=Acteur::orderBy('created_at','desc')->paginate(25);
        return view('admin.page.acteur.index')->with('acteurs',$acteur);
    }

    public function Add()
    {
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $categorie=CategorieActeur::orderBy('titre','desc')->get();
        return view('admin.page.acteur.add')->with('communes',$commune)->with('quartiers',$quartier)->with('categories',$categorie);
    }

    public function Search(Request $request)
    {
        $acteur=Acteur::where('nom','like','%' .$request->nom. '%')               
                    ->paginate(25);
        return view('admin.page.acteur.index')->with('acteurs',$acteur); 
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
        $acteur=new Acteur();
        $acteur->com_id=$request->com_id;
        $Commune=Commune::find($request->com_id);
        $acteur->com_slug=$Commune->slug;
        $acteur->qua_id=$request->qua_id;
        $quartier=Quartier::find($request->qua_id);
        $acteur->qua_slug=$quartier->slug;
        $acteur->nom=$request->nom;
        //$acteur->domaine=$request->domaine;
        $acteur->localisation=$request->localisation;
        $acteur->contact=$request->contact;
        $acteur->capacite=$request->capacite;
        $acteur->commodite=$request->commodite;
        $acteur->cat_id=$request->cat_id;
        $categorie=CategorieActeur::find($request->cat_id);
        $acteur->cat_slug=$categorie->slug;
        $acteur->autre=$request->autre;
        $acteur->user_id=Auth::user()->id;
        $acteur->slug=$slug;
        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $acteur->image=$imageName;
        }else {
            $acteur->image=null;
        }
        $acteur->save();
        if ($acteur) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function show(Acteur $acteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acteur=Acteur::find($id);
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $categorie=CategorieActeur::orderBy('titre','desc')->get();
        return view('admin.page.acteur.update')->with('acteur',$acteur)->with('communes',$commune)->with('quartiers',$quartier)->with('categories',$categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->nom);
        $acteur=Acteur::find($id);
        $acteur->com_id=$request->com_id;
        $Commune=Commune::find($request->com_id);
        $acteur->com_slug=$Commune->slug;
        $acteur->qua_id=$request->qua_id;
        $quartier=Quartier::find($request->qua_id);
        $acteur->qua_slug=$quartier->slug;
        $acteur->nom=$request->nom;
        //$acteur->domaine=$request->domaine;
        $acteur->localisation=$request->localisation;
        $acteur->contact=$request->contact;
        $acteur->capacite=$request->capacite;
        $acteur->commodite=$request->commodite;
        $acteur->cat_id=$request->cat_id;
        $categorie=CategorieActeur::find($request->cat_id);
        $acteur->cat_slug=$categorie->slug;
        $acteur->autre=$request->autre;
        $acteur->user_id=Auth::user()->id;
        $acteur->slug=$slug;
        if (request()->file('image')!=null) {
            if ($acteur->image != null) {
                Storage::delete('public/imgs/' .$acteur->image);
            }
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $acteur->image=$imageName;
        }else {
            $acteur->image=$acteur->image;
        }
        $acteur->save();

        if ($acteur) {
            return redirect()->route('administration.acteur')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acteur=Acteur::find($id);
        if ($acteur->image != null) {
            Storage::delete('public/imgs/' .$acteur->image);
        }
        $acteur->delete();
        if ($acteur){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
