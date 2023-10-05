<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Newsletter;
use App\Models\Categorie;
use Spatie\Analytics\Period;
use Analytics;
use App\Rules\ReCaptcha;
use PHPMailer\PHPMailer\Exception;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    public function index()
    {
        $meta_titre="Bddpromhandicam - contact";
        return view('front.contact')->with('meta_titre',$meta_titre);
    }


    public function Send(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $email=$request->email;
        $nom=$request->name;
        $phone=$request->phone;
        $objet=$request->subjet;
        $message=$request->message;
        Mail::to('contact@photil.com')->send(new Contact($nom,$email,$phone,$objet,$message));
        return redirect()->back()->with('success','Votre message à bien été envoyé!');
    }

    public function Subscrire(Request $request)
    {
        try {
            if (Newsletter::isSubscribed($request->email)) {
                 return redirect()->back()->with("errors","Email is already subscribed");
            }else{
                Newsletter::subscribe($request->email);
                return redirect()->back()->with("successs","Email subscribed");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with("errors",$th->getMessage());
        }
    }
}
