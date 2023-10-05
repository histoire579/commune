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

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $commune=Commune::where('slug',$slug)->first();
        $handicap = DB::table('handicapes')->where('com_slug',$slug)->count();
        $service=DB::table('services')->where('com_slug',$slug)->count();
        $acteur=DB::table('acteurs')->where('com_slug',$slug)->count();
        $partenaire=Partenaire::orderBy('created_at','desc')->get();
        $meta_titre="Bddpromhandicam - Commune -".$commune->nom;

        return view('front.commune.index')->with('handicap',$handicap)->with('service',$service)->with('acteur',$acteur)
        ->with('commune',$commune)->with('meta_titre',$meta_titre)->with('partenaires',$partenaire);
    }

    function Handicap(Commune $commune )  {
        $communes=Commune::where('slug',$commune->slug)->get();
        $quartier=Quartier::where('com_id',$commune->id)->orderBy('nom','desc')->get();
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
        $meta_titre="Bddpromhandicam - Handicap -".$commune->nom;

        $handicape=Handicape::with('commune','quartier','type')->where('com_id',$commune->id)->paginate(25)->withQueryString();
        return view('front.commune.handicap.index')->with('communes',$communes)->with('quartiers',$quartier)->with('types',$type)
                                    ->with('handicapes',$handicape)->with('sexes',$sexes)->with('commune',$commune)
                                    ->with('meta_titre',$meta_titre)->with('sueils',$sueils)->with('groupes',$groupe);
    }

    function Acteur(Commune $commune )  {
        $communes=Commune::where('slug',$commune->slug)->get();
        $quartier=Quartier::where('com_id',$commune->id)->orderBy('nom','desc')->get();
        $categorie=CategorieActeur::orderBy('titre','desc')->get();
        $meta_titre="Bddpromhandicam - Acteur -".$commune->nom;

        $acteur=Acteur::with('commune','quartier','categorie')->where('com_id',$commune->id)->paginate(25)->withQueryString();
        return view('front.commune.acteur.index')->with('communes',$communes)->with('quartiers',$quartier)->with('categories',$categorie)
        ->with('acteurs',$acteur)->with('commune',$commune)->with('meta_titre',$meta_titre);
    }

    function Service(Commune $commune )  {
        $communes=Commune::where('slug',$commune->slug)->get();
        $quartier=Quartier::where('com_id',$commune->id)->orderBy('nom','desc')->get();
        $categorie=CategorieService::orderBy('titre','desc')->get();
        $meta_titre="Bddpromhandicam - Service -".$commune->nom;

        $service=Service::with('commune','quartier','categorie')->where('com_id',$commune->id)->paginate(25)->withQueryString();
        return view('front.commune.service.index')->with('communes',$communes)->with('quartiers',$quartier)->with('categories',$categorie)
        ->with('services',$service)->with('commune',$commune)->with('meta_titre',$meta_titre);
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
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commune $commune)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
        //
    }
}
