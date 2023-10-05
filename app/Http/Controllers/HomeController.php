<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Pays;
use App\Models\User;
use App\Models\Picture;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images=Picture::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(30);
        $categories=Categorie::orderBy('titre','asc')->get();
        return view('front.home')->with('categories',$categories)->with('images',$images);
    }

    public function Profil()
    {
        $pays=Pays::all();
        $categories=Categorie::orderBy('titre','asc')->get();
        return view('front.profil')->with('categories',$categories)->with('pays',$pays);
    }

    public function UpdateUser(Request $request)
    {
        $user=User::find(auth()->user()->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pays_id' => $request->pays_id,
        ]);
        if ($user) {
            return redirect()->back()->with('success','Vos informations ont été modifiées avec succès!');
        } else {
            return redirect()->back()->with('error','Une erreur s\'est produite lors de la modification!');
        }
        
        
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function UpdateUserPassword(Request $request)
    {
        $this->validator($request->all())->validate();
        $user=User::find(auth()->user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            return redirect()->back()->with('success','Votre mot de passe ont été modifiées avec succès!');
        } else {
            return redirect()->back()->with('error','Une erreur s\'est produite lors de la modification!');
        }
        
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function Deconnexion(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

   

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    
}
