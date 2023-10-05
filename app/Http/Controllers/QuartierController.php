<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Handicape;
use App\Models\Service;
use App\Models\Acteur;
use App\Models\Quartier;
use App\Models\Type;
use App\Models\CategorieActeur;
use App\Models\CategorieService;
use App\Models\Partenaire;
use App\Models\Groupe;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuartierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $quartier=Quartier::where('slug',$slug)->first();
        $handicap = DB::table('handicapes')->where('qua_slug',$slug)->count();
        $service=DB::table('services')->where('qua_slug',$slug)->count();
        $acteur=DB::table('acteurs')->where('qua_slug',$slug)->count();
        $partenaire=Partenaire::orderBy('created_at','desc')->get();
        $meta_titre="Bddpromhandicam - Commune -".$quartier->nom;

        return view('front.quartier.index')->with('handicap',$handicap)->with('service',$service)->with('acteur',$acteur)
        ->with('quartier',$quartier)->with('meta_titre',$meta_titre)->with('partenaires',$partenaire);
    }

    function Handicap(Quartier $quartier )  {
        $quartiers=Quartier::where('id',$quartier->id)->orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $elts=[
            [
                'titre'=>'M',
                'Val'=>'M',
            ],
            [
                'titre'=>'F',
                'Val'=>'F',
            ],
        ];
        $sexes= new Collection($elts);
        $sueils= $this->Seuil();
        $groupe=Groupe::orderBy('titre','desc')->get();
        $meta_titre="Bddpromhandicam - Handicap -".$quartier->nom;

        $handicape=Handicape::with('commune','quartier','type')->where('qua_id',$quartier->id)->paginate(25)->withQueryString();
        return view('front.quartier.handicap.index')->with('quartiers',$quartiers)->with('types',$type)
                                    ->with('handicapes',$handicape)->with('sexes',$sexes)->with('quartier',$quartier)
                                    ->with('meta_titre',$meta_titre)->with('sueils',$sueils)->with('groupes',$groupe);
    }

    function Acteur(Quartier $quartier )  {
        $quartiers=Quartier::where('id',$quartier->id)->orderBy('nom','desc')->get();
        $categorie=CategorieActeur::orderBy('titre','desc')->get();
        $meta_titre="Bddpromhandicam - Acteur -".$quartier->nom;

        $acteur=Acteur::with('commune','quartier','categorie')->where('qua_id',$quartier->id)->paginate(25)->withQueryString();
        return view('front.quartier.acteur.index')->with('quartiers',$quartiers)->with('categories',$categorie)
        ->with('acteurs',$acteur)->with('quartier',$quartier)->with('meta_titre',$meta_titre);
    }

    function Service(Quartier $quartier )  {
        $quartiers=Quartier::where('id',$quartier->id)->orderBy('nom','desc')->get();
        $categorie=CategorieService::orderBy('titre','desc')->get();
        $meta_titre="Bddpromhandicam - Service -".$quartier->nom;

        $service=Service::with('commune','quartier','categorie')->where('qua_id',$quartier->id)->paginate(25)->withQueryString();
        return view('front.quartier.service.index')->with('quartiers',$quartiers)->with('categories',$categorie)
        ->with('services',$service)->with('quartier',$quartier)->with('meta_titre',$meta_titre);
    }

    public function Seuil() {
        $seuil=[
            [ 'titre'=>'5%','Val'=>'5%',],['titre'=>'10%','Val'=>'10%',],['titre'=>'15%','Val'=>'15%',],['titre'=>'20%','Val'=>'20%',],
            ['titre'=>'25%','Val'=>'25%',],['titre'=>'30%','Val'=>'30%',],['titre'=>'35%','Val'=>'35%',],['titre'=>'40%','Val'=>'40%',],
            ['titre'=>'45%','Val'=>'45%',],['titre'=>'50%','Val'=>'50%',], ['titre'=>'55%','Val'=>'55%',],['titre'=>'60%','Val'=>'60%',],
            ['titre'=>'65%','Val'=>'65%',],['titre'=>'70%','Val'=>'70%',],['titre'=>'75%','Val'=>'75%',],['titre'=>'80%','Val'=>'80%',],
            ['titre'=>'85%','Val'=>'85%',],['titre'=>'90%','Val'=>'90%',],['titre'=>'95%','Val'=>'95%',],['titre'=>'100%','Val'=>'100%',],
        ];
       return new Collection($seuil);
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
        //
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
    public function edit(Quartier $quartier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quartier $quartier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quartier $quartier)
    {
        //
    }
}
