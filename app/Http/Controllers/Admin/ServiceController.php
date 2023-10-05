<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Commune;
use App\Models\Quartier;
use App\Models\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
        $service=Service::orderBy('created_at','desc')->paginate(25);
        return view('admin.page.service.index')->with('services',$service);
    }

    public function Add()
    {
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $categorie=CategorieService::orderBy('titre','desc')->get();
        return view('admin.page.service.add')->with('communes',$commune)->with('quartiers',$quartier)->with('categories',$categorie);
    }

    public function Search(Request $request)
    {
        $service=Service::where('nom','like','%' .$request->nom. '%')               
                    ->paginate(25);
        return view('admin.page.service.index')->with('services',$service); 
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
        $service=new Service();
        $service->com_id=$request->com_id;
        $Commune=Commune::find($request->com_id);
        $service->com_slug=$Commune->slug;
        $service->qua_id=$request->qua_id;
        $quartier=Quartier::find($request->qua_id);
        $service->qua_slug=$quartier->slug;
        $service->nom=$request->nom;
        $service->localisation=$request->localisation;
        $service->contact=$request->contact;
        $service->capacite=$request->capacite;
        $service->commodite=$request->commodite;
        $service->mesure=$request->mesure;
        $service->qualite=$request->qualite;
        $service->amelioration=$request->amelioration;
        $service->cat_id=$request->cat_id;
        $categorie=CategorieService::find($request->cat_id);
        $service->cat_slug=$categorie->slug;
        $service->autre=$request->autre;
        $service->user_id=Auth::user()->id;
        $service->slug=$slug;
        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $service->image=$imageName;
        }else {
            $service->image=null;
        }
        $service->save();
        if ($service) {
            return redirect()->back()->with('success','Enregistrer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::find($id);
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $categorie=CategorieService::orderBy('titre','desc')->get();
        return view('admin.page.service.update')->with('service',$service)->with('communes',$commune)->with('quartiers',$quartier)->with('categories',$categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->nom);
        $service=Service::find($id);
        $service->com_id=$request->com_id;
        $Commune=Commune::find($request->com_id);
        $service->com_slug=$Commune->slug;
        $service->qua_id=$request->qua_id;
        $quartier=Quartier::find($request->qua_id);
        $service->qua_slug=$quartier->slug;
        $service->nom=$request->nom;
        $service->localisation=$request->localisation;
        $service->contact=$request->contact;
        $service->capacite=$request->capacite;
        $service->commodite=$request->commodite;
        $service->mesure=$request->mesure;
        $service->qualite=$request->qualite;
        $service->amelioration=$request->amelioration;
        $service->cat_id=$request->cat_id;
        $categorie=CategorieService::find($request->cat_id);
        $service->cat_slug=$categorie->slug;
        $service->autre=$request->autre;
        $service->user_id=Auth::user()->id;
        $service->slug=$slug;
        if (request()->file('image')!=null) {
            if ($service->image != null) {
                Storage::delete('public/imgs/' .$service->image);
            }
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $service->image=$imageName;
        }else {
            $service->image=$service->image;
        }
        $service->save();

        if ($service) {
            return redirect()->route('administration.service')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Acteur::find($id);
        if ($service->image != null) {
            Storage::delete('public/imgs/' .$service->image);
        }
        $service->delete();
        if ($service){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
