<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Handicape;
use App\Models\Commune;
use App\Models\Quartier;
use App\Models\Type;
use App\Models\Groupe;
use App\Models\Acteur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HandicapeController extends Controller
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
        $handicape=Handicape::orderBy('created_at','desc')->paginate(25);
        return view('admin.page.handicape.index')->with('handicapes',$handicape);
    }

    public function Add()
    {
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $groupe=Groupe::orderBy('titre','desc')->get();
        $acteur=Acteur::orderBy('nom','asc')->get();
        $elts=[
            [ 'titre'=>'5%','Val'=>'5%',],['titre'=>'10%','Val'=>'10%',],['titre'=>'15%','Val'=>'15%',],['titre'=>'20%','Val'=>'20%',],
            ['titre'=>'25%','Val'=>'25%',],['titre'=>'30%','Val'=>'30%',],['titre'=>'35%','Val'=>'35%',],['titre'=>'40%','Val'=>'40%',],
            ['titre'=>'45%','Val'=>'45%',],['titre'=>'50%','Val'=>'50%',], ['titre'=>'55%','Val'=>'55%',],['titre'=>'60%','Val'=>'60%',],
            ['titre'=>'65%','Val'=>'65%',],['titre'=>'70%','Val'=>'70%',],['titre'=>'75%','Val'=>'75%',],['titre'=>'80%','Val'=>'80%',],
            ['titre'=>'85%','Val'=>'85%',],['titre'=>'90%','Val'=>'90%',],['titre'=>'95%','Val'=>'95%',],['titre'=>'100%','Val'=>'100%',],
        ];
        $sueils= new Collection($elts);

        return view('admin.page.handicape.add')->with('communes',$commune)->with('quartiers',$quartier)
        ->with('types',$type)->with('groupes',$groupe)->with('acteurs',$acteur)->with('sueils',$sueils);
    }

    public function Search(Request $request)
    {
        $handicape=Handicape::where('nom','like','%' .$request->nom. '%')               
                    ->paginate(20);
        return view('admin.page.handicape.index')->with('handicapes',$handicape); 
    }

    public function MaxId()
    {
        $id=DB::table('handicapes')->count('id');
        return $id + 1; 
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
        $handicape=new Handicape();
        $handicape->com_id=$request->com_id;
        $Commune=Commune::find($request->com_id);
        $handicape->com_slug=$Commune->slug;
        $handicape->qua_id=$request->qua_id;
        $quartier=Quartier::find($request->qua_id);
        $handicape->qua_slug=$quartier->slug;
        $handicape->matricule='PVHMF'.$this->MaxId();
        $handicape->nom=$request->nom;
        $handicape->anneeNais=$request->anneeNais;
        $handicape->sexe=$request->sexe;
        $handicape->lieuNais=$request->lieuNais;
        $handicape->cni=$request->cni;
        $handicape->ci=$request->ci;
        $handicape->type_id=$request->type_id;
        $handicape->groupe_id=$request->groupe_id;
        $type=Type::find($request->type_id);
        $handicape->type_slug=$type->slug;
        $handicape->occupation=$request->occupation;
        $handicape->niveau=$request->niveau;
        $handicape->formation=$request->formation;
        $handicape->besoin=$request->besoin;
        $handicape->telephone=$request->telephone;
        $handicape->acteur_id=$request->acteur_id;
        $handicape->detail=$request->detail;
        $handicape->seuil=$request->seuil;
        $handicape->siCni=$request->siCni;
        $handicape->siCniv=$request->siCniv;
        $handicape->siActe=$request->siActe;
        $handicape->acteNais=$request->acteNais;
        $handicape->situation=$request->situation;
        $handicape->polyhandicap=$request->polyhandicap;
        $handicape->scolaire=$request->scolaire;
        $handicape->user_id=Auth::user()->id;
        $handicape->slug=$slug;
        if (request()->file('image')!=null) {
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $handicape->image=$imageName;
        }else {
            $handicape->image=null;
        }
        $handicape->save();
        if ($handicape) {
            Session::flash("success","Enregistrer avec succès!" );
            return response()->json(['success' => 'Enregistrer avec succès!']);
        }else{
            Session::flash('error','Une erreur s\'est produite!');
            return response()->json(['error' => 'Une erreur s\'est produite!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function show(Handicape $handicape)
    {
        //
    }

    public function Save(Request $request)
    {
        $old=Handicape::where('nom',$request->nom)->where('anneeNais',$request->anneeNais)->where('cni',$request->cni)->where('ci',$request->ci)->first();
        if ($old) {
            return response()->json([
                'status'=> 400,
                'error'=> 'Il existe déjà un enregistrement comment celui-ci voulez-vous continuer quand même?',
            ]);
        } else {
            $slug=Str::slug($request->nom);
            $handicape=new Handicape();
            $handicape->com_id=$request->com_id;
            $Commune=Commune::find($request->com_id);
            $handicape->com_slug=$Commune->slug;
            $handicape->qua_id=$request->qua_id;
            $quartier=Quartier::find($request->qua_id);
            $handicape->qua_slug=$quartier->slug;
            $handicape->matricule='PVHMF'.$this->MaxId();
            $handicape->nom=$request->nom;
            $handicape->anneeNais=$request->anneeNais;
            $handicape->sexe=$request->sexe;
            $handicape->lieuNais=$request->lieuNais;
            $handicape->cni=$request->cni;
            $handicape->ci=$request->ci;
            $handicape->type_id=$request->type_id;
            $handicape->groupe_id=$request->groupe_id;
            $type=Type::find($request->type_id);
            $handicape->type_slug=$type->slug;
            $handicape->occupation=$request->occupation;
            $handicape->niveau=$request->niveau;
            $handicape->formation=$request->formation;
            $handicape->besoin=$request->besoin;
            $handicape->telephone=$request->telephone;
            $handicape->acteur_id=$request->acteur_id;
            $handicape->detail=$request->detail;
            $handicape->seuil=$request->seuil;
            $handicape->siCni=$request->siCni;
            $handicape->siCniv=$request->siCniv;
            $handicape->siActe=$request->siActe;
            $handicape->acteNais=$request->acteNais;
            $handicape->situation=$request->situation;
            $handicape->polyhandicap=$request->polyhandicap;
            $handicape->scolaire=$request->scolaire;
            $handicape->user_id=Auth::user()->id;
            $handicape->slug=$slug;
            if (request()->file('image')!=null) {
                $img=request()->file('image');
                $imageName=$img->getClientOriginalName();
                $imageName=time().'_'.$imageName;
                $path=request()->file('image')->storeAs('public/imgs',$imageName);
                $handicape->image=$imageName;
            }else {
                $handicape->image=null;
            }
            $handicape->save();
            if ($handicape) {
                Session::flash("success","Enregistrer avec succès!" );
                return response()->json([
                    'status'=> 200,
                    'success'=> 'Enregistrer avec succès!',
                ]);
            }else{
                Session::flash('error','Une erreur s\'est produite!');
                return response()->json(['error' => 'Une erreur s\'est produite!']);
            }
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $handicape=Handicape::find($id);
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $groupe=Groupe::orderBy('titre','desc')->get();
        $acteur=Acteur::orderBy('nom','asc')->get();
        $elts=[
            [ 'titre'=>'5%','Val'=>'5%',],
            ['titre'=>'10%','Val'=>'10%',],
            ['titre'=>'15%','Val'=>'15%',],
            ['titre'=>'20%','Val'=>'20%',],
            ['titre'=>'25%','Val'=>'25%',],
            ['titre'=>'30%','Val'=>'30%',],
            ['titre'=>'35%','Val'=>'35%',],
            ['titre'=>'40%','Val'=>'40%',],
            ['titre'=>'45%','Val'=>'45%',],
            ['titre'=>'50%','Val'=>'50%',],
            ['titre'=>'55%','Val'=>'55%',],
            ['titre'=>'60%','Val'=>'60%',],
            ['titre'=>'65%','Val'=>'65%',],
            ['titre'=>'70%','Val'=>'70%',],
            ['titre'=>'75%','Val'=>'75%',],
            ['titre'=>'80%','Val'=>'80%',],
            ['titre'=>'85%','Val'=>'85%',],
            ['titre'=>'90%','Val'=>'90%',],
            ['titre'=>'95%','Val'=>'95%',],
            ['titre'=>'100%','Val'=>'100%',],
        ];
        $sueils= new Collection($elts);

        return view('admin.page.handicape.update')->with('handicape',$handicape)->with('communes',$commune)
        ->with('quartiers',$quartier)->with('types',$type)->with('groupes',$groupe)
        ->with('acteurs',$acteur)->with('sueils',$sueils);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug=Str::slug($request->nom);
        $handicape=Handicape::find($id);
        $handicape->com_id=$request->com_id;
        $Commune=Commune::find($request->com_id);
        $handicape->com_slug=$Commune->slug;
        $handicape->qua_id=$request->qua_id;
        $quartier=Quartier::find($request->qua_id);
        $handicape->qua_slug=$quartier->slug;
        $handicape->matricule=$request->matricule;
        $handicape->nom=$request->nom;
        $handicape->anneeNais=$request->anneeNais;
        $handicape->sexe=$request->sexe;
        $handicape->lieuNais=$request->lieuNais;
        $handicape->cni=$request->cni;
        $handicape->ci=$request->ci;
        $handicape->type_id=$request->type_id;
        $type=Type::find($request->type_id);
        $handicape->type_slug=$type->slug;
        $handicape->groupe_id=$request->groupe_id;
        $handicape->occupation=$request->occupation;
        $handicape->niveau=$request->niveau;
        $handicape->formation=$request->formation;
        $handicape->besoin=$request->besoin;
        $handicape->telephone=$request->telephone;
        $handicape->acteur_id=$request->acteur_id;
        $handicape->detail=$request->detail;
        $handicape->seuil=$request->seuil;
        $handicape->siCni=$request->siCni;
        $handicape->siCniv=$request->siCniv;
        $handicape->siActe=$request->siActe;
        $handicape->acteNais=$request->acteNais;
        $handicape->situation=$request->situation;
        $handicape->polyhandicap=$request->polyhandicap;
        $handicape->scolaire=$request->scolaire;
        $handicape->user_id=Auth::user()->id;
        $handicape->slug=$slug;
        if (request()->file('image')!=null) {
            if ($handicape->image != null) {
                Storage::delete('public/imgs/' .$handicape->image);
            }
            $img=request()->file('image');
            $imageName=$img->getClientOriginalName();
            $imageName=time().'_'.$imageName;
            $path=request()->file('image')->storeAs('public/imgs',$imageName);
            $handicape->image=$imageName;
        }else {
            $handicape->image=$handicape->image;
        }
        $handicape->save();
        if ($handicape) {
            return redirect()->route('administration.handicape')->with('success','Modifier avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $handicape=Handicape::find($id);
        if ($handicape->image != null) {
            Storage::delete('public/imgs/' .$handicape->image);
        }
        $handicape->delete();
        if ($handicape){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
