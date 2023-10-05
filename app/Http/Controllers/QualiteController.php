<?php

namespace App\Http\Controllers;

use App\Models\Qualite;
use App\Models\Thematique;
use App\Models\Service;
use Illuminate\Http\Request;

class QualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Thematique $theme)
    {
        $qualite=Qualite::with('service','theme','appreciation')->where('slug_app',$theme->slug)->orderBy('theme_id','desc')->paginate(25)->withQueryString();
        $service=Service::orderBy('nom','asc')->get();
        $meta_titre="Qualités de service par thématique";
        
        return view('front.qualite.index')->with('qualites',$qualite)->with('theme',$theme)->with('services',$service)->with('meta_titre',$meta_titre);
    }

    public function Search(Request $request)
    {
        if ($request->ajax()) {
            $service_id=$request->service_id;
            $theme_id=$request->theme_id;
            $qualites="";

            $service=Service::orderBy('nom','asc')->get();
            $theme=Thematique::find($theme_id); 

            if ($service_id == '0' && $theme_id != '0') {
                $qualites=Qualite::with('service','theme','appreciation')->where('theme_id',$theme_id)->orderBy('theme_id','desc')->paginate(25)->withQueryString();
            }

            if ($service_id != '0' && $theme_id != '0') {
                $qualites=Qualite::with('service','theme','appreciation')->where('service_id',$service_id)->where('theme_id',$theme_id)->orderBy('theme_id','desc')->paginate(25)->withQueryString();
            }

            return view('front.qualite.content')->with('qualites',$qualites)->with('services',$service)->with('theme',$theme)->render();
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
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function show(Qualite $qualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualite $qualite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualite $qualite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualite  $qualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualite $qualite)
    {
        //
    }
}
