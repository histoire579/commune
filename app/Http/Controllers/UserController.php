<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.register');
    }

    public function Register(Request $request): JsonResponse
    {
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            $response=[
                'status' => 201,
                'message' => $validator->errors()
            ];
            return response()->json($response, 201);
        }

        if ($request->condition == null) {
            $response=[
                'status' => 202,
                'message' => 'Veuillez accepter les conditions d\'utilisation.'
            ];
            return response()->json($response, 202);
        }

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->active=0;
        $user->save();

        if ($user) {
            $success['name']=$user->name;

            $response=[
                'status' => 200,
                'data' => $success,
                'message' => 'Utilisateur creer avec succès'
            ];
            
            return response()->json($response, 200);
        } else {

            $response=[
                'status' => 202,
                'message' => 'Utilisateur creer avec succès'
            ];
            
            return response()->json($response, 202);
        }
        
        
    }

    public function Login(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            $response=[
                'status' => 201,
                'message' => $validator->errors()
            ];
            return response()->json($response, 201);
        }
        
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'active' => 1])) {
            //$user=Auth::user();
            $user=$request->user();
            //$success['token']=$user->createToken('ecole')->plainTextToken;
            $success['name']=$user->name;

            $response=[
                'status' => 200,
                'data' => $success,
                'message' => 'Utilisateur connecter avec succès'
            ];
            return response()->json($response, 200);
        }else {
            $response=[
                'status' => 202,
                'message' => 'Login ou mot de passe incorrect'
            ];
            return response()->json($response, 202);
        }
    }

    public function Deconnexion(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect('/');

        // $response=[
        //     'status' => 200,
        //     'message' => 'Utilisateur déconnecter avec succès'
        // ];
    
        // return response()->json($response, 200);
    }

    public function Retour()
    {
        return redirect()->back();
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
