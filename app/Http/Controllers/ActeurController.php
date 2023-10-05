<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Commune;
use App\Models\Quartier;
use App\Models\CategorieActeur;
use Illuminate\Http\Request;

class ActeurController extends Controller
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
        $categorie=CategorieActeur::orderBy('titre','desc')->get();
        $meta_titre="Bddpromhandicam - Acteur";

        $acteur=Acteur::with('commune','quartier','categorie')->paginate(25)->withQueryString();
        return view('front.acteur.index')->with('communes',$commune)->with('quartiers',$quartier)->with('categories',$categorie)
                                    ->with('acteurs',$acteur)->with('meta_titre',$meta_titre);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $commune_id=$request->com_id;
            $quartier_id=$request->qua_id;
            $cat_id=$request->cat_id;
            $acteurs="";
            //$year = Carbon::now()->format('Y');

            $commune=Commune::all();
            $quartier=Quartier::orderBy('nom','desc')->get();
            $categorie=CategorieActeur::orderBy('titre','desc')->get();

            if ($commune_id == '0' && $quartier_id == '0' && $cat_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')->paginate(25)->withQueryString();
            }
            
            if ($commune_id != '0' && $quartier_id == '0' && $cat_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')->where('com_id',$commune_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id != '0' && $quartier_id != '0' && $cat_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')->where('com_id',$commune_id)
                ->where('qua_id',$quartier_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id != '0' && $cat_id != '0' && $quartier_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('com_id',$commune_id)
                ->where('cat_id',$cat_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id == '0' && $quartier_id == '0' && $cat_id != '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('cat_id',$cat_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id != '0' && $quartier_id != '0' && $cat_id != '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('com_id',$commune_id)
                ->where('qua_id',$quartier_id)
                ->where('cat_id',$cat_id)
                ->paginate(25)->withQueryString();
            }

            return view('front.acteur.content')->with('acteurs',$acteurs)->with('communes',$commune)
            ->with('quartiers',$quartier)->with('categories',$categorie)->render();
        }
    }

    public function searchByCommune(Request $request)
    {
        if ($request->ajax()) {
            $commune_id=$request->com_id;
            $quartier_id=$request->qua_id;
            $cat_id=$request->cat_id;
            $acteurs="";
            //$year = Carbon::now()->format('Y');

            $commune=Commune::where('id',$commune_id)->get();
            $quartier=Quartier::where('com_id',$commune_id)->orderBy('nom','desc')->get();
            $categorie=CategorieActeur::orderBy('titre','desc')->get();
            
            if ($commune_id != '0' && $quartier_id == '0' && $cat_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')->where('com_id',$commune_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id != '0' && $quartier_id != '0' && $cat_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')->where('com_id',$commune_id)
                ->where('qua_id',$quartier_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id != '0' && $cat_id != '0' && $quartier_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('com_id',$commune_id)
                ->where('cat_id',$cat_id)
                ->paginate(25)->withQueryString();
            }

            if ($commune_id != '0' && $quartier_id != '0' && $cat_id != '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('com_id',$commune_id)
                ->where('qua_id',$quartier_id)
                ->where('cat_id',$cat_id)
                ->paginate(25)->withQueryString();
            }

            return view('front.commune.acteur.content')->with('acteurs',$acteurs)->with('communes',$commune)
            ->with('quartiers',$quartier)->with('categories',$categorie)->render();
        }
    }

    public function searchByQuartier(Request $request)
    {
        if ($request->ajax()) {
            $quartier_id=$request->qua_id;
            $cat_id=$request->cat_id;
            $acteurs="";
            //$year = Carbon::now()->format('Y');

            $quartier=Quartier::where('id',$quartier_id)->orderBy('nom','desc')->get();
            $categorie=CategorieActeur::orderBy('titre','desc')->get();

            if ($quartier_id != '0' && $cat_id == '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('qua_id',$quartier_id)
                ->paginate(25)->withQueryString();
            }

            if ($quartier_id != '0' && $cat_id != '0') {
                $acteurs=Acteur::with('commune','quartier','categorie')
                ->where('qua_id',$quartier_id)
                ->where('cat_id',$cat_id)
                ->paginate(25)->withQueryString();
            }

            return view('front.quartier.acteur.content')->with('acteurs',$acteurs)
            ->with('quartiers',$quartier)->with('categories',$categorie)->render();
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
        $acteur=Acteur::with('commune','quartier','categorie')->find($id);

        if ($acteur) {
            $response=[
                'success' => true,
                'data' => $acteur,
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
     * @param  \App\Models\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acteur $acteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acteur $acteur)
    {
        //
    }
}
