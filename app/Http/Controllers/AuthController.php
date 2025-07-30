<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function inscriptionPage(){
        return view('inscription');
    }
    public function connecterPage(){
        return view('login');
    }
    public function forgetPage(){
        return view('forget');
    }
    public function reinitialisationPage(){
        return view('reset');
    }
    public function accueilPage(){
        return view('home');
    }

    public function connecter(Request $request){


        if (Auth::attempt($request->only('email','password'))){
           return redirect("/accueil");
        }
        return back()->with("status","Le mot de passe ou email est incorrect !");

    }

    public function deconnecter (){
        Auth::logout();
        return redirect("/login");
    }

    public function inscrire(Request $request){

//        $messages =[
//            'nom.required' =>'Le nom est obligatoire',
//            'email.required' =>"l'email est obligatoire",
//            'prenom.required' =>'Le prénom est obligatoire',
//            'adresse.required' =>"L'adresse est obligatoire",
//            'mdp.required' =>'Le mot de passe est obligatoire',
//            'confMdp.required' =>'La confirmation du mot  passe est obligatoire',
//        ];

//        return $request->email;
        //partie du contrôle de validation des champs
        $request->validate([
            'email'=>'required|email|unique:users',
            'prenom'=>'required|string|min:5',
            'nom'=>'required|string|min:4',
            'telephone'=>'required|string|min:7|max:9',
            'password'=>'required|string|min:8|confirmed',
        ]);
//        $user=new User();
//                $user->prenom = $request->prenom;
//                $user->nom = $request->nom;
//                $user->telephone = $request->telephone;
//                $user->adresse = $request->adresse;
//                $user->email = $request->email;
//                $user->password = $request->password;
//                $user->save();



        User::create(
            [

                "prenom"=>$request->prenom,
                "nom"=>$request->nom,
                "telephone"=>$request->telephone,
                "email"=>$request->email,
                "password"=>$request->password,
                "adresse"=>$request->adresse

            ]
        );
        return back()->with("status","inscription reussite !");

//return redirect("login",compact('request'));

    }


    public function changerMotDePassePage(){
        return view('changerMotDePasse');
}

public function envoyerEmailPage(){
        return view('email');
}

public function changerMotPassEtConfPage(){
        return view('changerMotReset');
}

public function resetPasswordForm($token){
        return view('reset',compact('token'));
}

//parties metier

public function changerMotPassEtConf(Request $request){
        return $request;

}


public function envoyerEmail(Request $request){

        //les contraintes  pour la validation du champ email
    $request->validate([
        'email'=>'required|email|exists:users,email'
    ]);

    try {
        //la variable token avec la fonction aléatoire Str::random(40)
        $token= Str::random(40);

//    $user=User::where('email',$request->email)->first();
        DB::table("password_resets")->where("email",$request->email) ->delete();

        DB::table("password_resets")->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>now()
        ]);
        Mail::send('verification',compact('token'),function ($message) use ($request){
            $message->to($request->email)->subject('Email de réinitialisation de mot de passe');
            $message->from(config("mail.from.address"),config("mail.from.name"));
        });
        return back()->with("status","un email de réinitialisation de mot de passe vous a été envoyé");
    }catch (\Exception $e){
        return back()->with("status","erreur lors de l'envoie de l'email");
    }

return "";

}

}
