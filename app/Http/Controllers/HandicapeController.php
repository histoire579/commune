<?php

namespace App\Http\Controllers;

use App\Models\Handicape;

use App\Models\Commune;
use App\Models\Quartier;
use App\Models\Type;
use App\Models\Groupe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HandicapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $elts=[
            ['titre'=>'M','Val'=>'M',],
            ['titre'=>'F','Val'=>'F',],
        ];
        $sexes= new Collection($elts);
        $sueils= $this->Seuil();
        $groupe=Groupe::orderBy('titre','desc')->get();
        
        $meta_titre="Bddpromhandicam - Handicap";

        $handicape=Handicape::with('commune','quartier','type','groupe','acteur')->paginate(25)->withQueryString();
        return view('front.handicap.index')->with('communes',$commune)->with('quartiers',$quartier)->with('types',$type)
                                    ->with('handicapes',$handicape)->with('sexes',$sexes)
                                    ->with('meta_titre',$meta_titre)->with('sueils',$sueils)->with('groupes',$groupe);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $commune_id=$request->com_id;
        $quartier_id=$request->qua_id;
        $cat=$request->type_id;
        $sexe=$request->sexe;
        $age=$request->age;
        $handicape="";
        $year = Carbon::now()->format('Y');

        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')->paginate(25)->withQueryString();
        }
        
        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')->where('com_id',$commune_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $cat != '0' && $quartier_id == '0' && $sexe == '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('type_id',$cat)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat != '0' && $sexe == '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('type_id',$cat)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat != '0' && $sexe != '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age != null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }
        
        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age != null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat != '0' && $sexe != '0' && $age != null) {
            $handicape=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        return view('front.handicap.index')->with('communes',$commune)->with('quartiers',$quartier)->with('types',$type)
                                    ->with('handicapes',$handicape);
    }


    public function search1(Request $request)
    {
        if ($request->ajax()) {
        $commune_id=$request->com_id;
        $quartier_id=$request->qua_id;
        $cat=$request->type_id;
        $sexe=$request->sexe;
        $age=$request->age;
        $seuil=$request->seuil;
        $groupe_id=$request->groupe;
        $handicapes="";
        $year = Carbon::now()->format('Y');

        $commune=Commune::all();
        $quartier=Quartier::orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $elts=[
            ['titre'=>'M','Val'=>'M',],
            ['titre'=>'F','Val'=>'F',],
        ];
        $sexes= new Collection($elts);
        $sueils= $this->Seuil();
        $groupe=Groupe::orderBy('titre','desc')->get();

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->paginate(25)->withQueryString();
        }
        
        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('com_id',$commune_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $cat != '0' && $quartier_id == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('type_id',$cat)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat != '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('type_id',$cat)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat != '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil != '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('seuil',$seuil)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil != '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('seuil',$seuil)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil != '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('seuil',$seuil)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id == '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat != '0' && $sexe != '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat != '0' && $sexe != '0' && $age != null && $seuil != '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->where('seuil',$seuil)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        
        //return response()->json($handicape);
         return view('front.handicap.content')->with('handicapes',$handicapes)->with('communes',$commune)
         ->with('quartiers',$quartier)->with('types',$type)->with('sexes',$sexes)
         ->with('sueils',$sueils)->with('groupes',$groupe)->render();
         //->with('handicapes',$handicape)->with('communes',$commune)->with('quartiers',$quartier)->with('types',$type)
         
        }
    }


    public function searchByCommune(Request $request)
    {
        if ($request->ajax()) {
        $commune_id=$request->com_id;
        $quartier_id=$request->qua_id;
        $cat=$request->type_id;
        $sexe=$request->sexe;
        $age=$request->age;
        $seuil=$request->seuil;
        $groupe_id=$request->groupe;
        $handicapes="";
        $year = Carbon::now()->format('Y');

        $commune=Commune::where('id',$commune_id)->get();
        $quartier=Quartier::where('com_id',$commune_id)->orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $elts=[
            ['titre'=>'M','Val'=>'M',],
            ['titre'=>'F','Val'=>'F',],
        ];
        $sexes= new Collection($elts);
        $sueils= $this->Seuil();
        $groupe=Groupe::orderBy('titre','desc')->get();
        
        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('com_id',$commune_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $cat != '0' && $quartier_id == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('type_id',$cat)
            ->paginate(25)->withQueryString();
        }


        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }
        
        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil != '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('seuil',$seuil)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil != '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('seuil',$seuil)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id == '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat != '0' && $sexe != '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($commune_id != '0' && $quartier_id != '0' && $cat != '0' && $sexe != '0' && $age != null && $seuil != '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')
            ->where('com_id',$commune_id)
            ->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->where('seuil',$seuil)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }
        //return response()->json($handicape);
         return view('front.commune.handicap.content')->with('handicapes',$handicapes)->with('communes',$commune)
         ->with('quartiers',$quartier)->with('types',$type)->with('sexes',$sexes)
         ->with('sueils',$sueils)->with('groupes',$groupe)->render();
         //->with('handicapes',$handicape)->with('communes',$commune)->with('quartiers',$quartier)->with('types',$type)
         
        }
    }

    public function searchByQuartier(Request $request)
    {
        if ($request->ajax()) {
        $quartier_id=$request->qua_id;
        $cat=$request->type_id;
        $sexe=$request->sexe;
        $age=$request->age;
        $seuil=$request->seuil;
        $groupe_id=$request->groupe;
        $handicapes="";
        $year = Carbon::now()->format('Y');

        $quartier=Quartier::where('id',$quartier_id)->orderBy('nom','desc')->get();
        $type=Type::orderBy('titre','desc')->get();
        $elts=[
            ['titre'=>'M','Val'=>'M',],
            ['titre'=>'F','Val'=>'F',],
        ];
        $sexes= new Collection($elts);
        $sueils= $this->Seuil();
        $groupe=Groupe::orderBy('titre','desc')->get();
        
        if ($quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->paginate(25)->withQueryString();
        }

        if ($quartier_id != '0' && $cat != '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->paginate(25)->withQueryString();
        }

        if ($quartier_id != '0' && $cat == '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }


        if ($quartier_id != '0' && $cat == '0' && $sexe == '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }
        
        if ($quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil != '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('seuil',$seuil)
            ->paginate(25)->withQueryString();
        }

        if ($quartier_id != '0' && $cat == '0' && $sexe == '0' && $age == null && $seuil == '0' && $groupe_id != '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('groupe_id',$groupe_id)
            ->paginate(25)->withQueryString();
        }

        if ($quartier_id != '0' && $cat != '0' && $sexe != '0' && $age == null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->paginate(25)->withQueryString();
        }

        if ($quartier_id != '0' && $cat != '0' && $sexe == '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

        if ($quartier_id != '0' && $cat != '0' && $sexe != '0' && $age != null && $seuil == '0' && $groupe_id == '0') {
            $handicapes=Handicape::with('commune','quartier','type','groupe','acteur')->where('qua_id',$quartier_id)
            ->where('type_id',$cat)
            ->where('sexe',$sexe)
            ->whereRaw("". $year ." - anneeNais = ?", $age)
            ->paginate(25)->withQueryString();
        }

         return view('front.quartier.handicap.content')->with('handicapes',$handicapes)
         ->with('quartiers',$quartier)->with('types',$type)->with('sexes',$sexes)
         ->with('sueils',$sueils)->with('groupes',$groupe)->render();
         //->with('handicapes',$handicape)->with('communes',$commune)->with('quartiers',$quartier)->with('types',$type)
         
        }
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
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function show(Handicape $handicape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $handicape=Handicape::with('commune','quartier','type','groupe','acteur')->find($id);

        if ($handicape) {
            $response=[
                'success' => true,
                'data' => $handicape,
                'status' => 200
            ];
            
            return response()->json($response);
        }else {
            $response=[
                'success' => true,
                'message' => 'Cet élément n\'existe pas',
                'status' => 404
            ];
            
            return response()->json($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Handicape $handicape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Handicape  $handicape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handicape $handicape)
    {
        //
    }
}
