<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Handicape;
use App\Models\Commune;
use App\Models\Quartier;
use App\Models\Acteur;
use App\Models\Service;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $handicapes=DB::table('handicapes')->count();
        $acteurs=DB::table('acteurs')->count();
        $services=DB::table('services')->count();
        $communes=DB::table('communes')->count();
        $quartiers=DB::table('quartiers')->count();
        //->with('categories',$categories)->with('images',$images)->with('pub',$pub)
        return view('admin.dashboard')->with('handicapes',$handicapes)->with('acteurs',$acteurs)->with('services',$services)
        ->with('services',$services)->with('communes',$communes)->with('quartiers',$quartiers);
    }

    public function UserList()
    {
        $user=User::orderBy('created_at','desc')->paginate(20);
        return view('admin.page.utilisateur.list')->with('users',$user);
    }

    public function Search(Request $request)
    {
        $user=User::where('name','like','%' .$request->nom. '%')               
                    ->paginate(20);
        return view('admin.page.utilisateur.list')->with('users',$user); 
    }

    public function Activer(User $user)
    {
        $user->update([
            'active' => 1
        ]);

        return redirect()->back()->with('success','Utilisateur à ien été activé !');
    }

    public function Desactiver(User $user)
    {
        $user->update([
            'active' => 0
        ]);

        return redirect()->back()->with('success','Utilisateur à ien été désactivé !');
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        
        $user->delete();
        if ($user){
            return redirect()->back()->with('success','Supprimer avec succès!');
        }else{
            return redirect()->back()->with('error','Une erreur s\'est produite!');
        }
    }
}
