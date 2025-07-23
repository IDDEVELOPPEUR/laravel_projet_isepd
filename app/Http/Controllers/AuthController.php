<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
//
//
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
}
