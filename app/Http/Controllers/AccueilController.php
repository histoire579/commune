<?php

namespace App\Http\Controllers;

use App\Models\Handicape;
use App\Models\Service;
use App\Models\Acteur;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $handicap = DB::table('handicapes')->count();
        $service=DB::table('services')->count();
        $acteur=DB::table('acteurs')->count();
        $partenaire=Partenaire::orderBy('created_at','desc')->get();
        $meta_titre="Bddpromhandicam";

        return view('homePage')->with('handicap',$handicap)->with('service',$service)->with('acteur',$acteur)
        ->with('meta_titre',$meta_titre)->with('partenaires',$partenaire);
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
    public function edit(Handicape $handicape)
    {
        //
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
