<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/les-etudiants',[EtudiantController::class,'etudiants']);
Route::get('/inscription',[AuthController::class,'inscriptionPage']);
Route::get('/login',[AuthController::class,'connecterPage']);
Route::get('/forget',[AuthController::class,'forgetPage']);
Route::get('/reset',[AuthController::class,'reinitialisationPage']);
Route::get('/accueil',[AuthController::class,'accueilPage']);
Route::get('/changerMotDePasse',[AuthController::class,'changerMotDePassePage']);
Route::get('/envoyerEmail',[AuthController::class,'envoyerEmailPage']);
Route::get('/changerMotPassEtConf',[AuthController::class,'changerMotPassEtConfPage']);


//pour les routes metieres
Route::post('/inscrire',[AuthController::class,'inscrire']);
Route::post('/connecter',[AuthController::class,'connecter']);
Route::post('/deconnexion',[AuthController::class,'deconnecter']);
Route::post('/changerMotDePasse',[AuthController::class,'changerMotDePasse']);
Route::post('/envoyerEmail',[AuthController::class,'envoyerEmail']);
Route::post('/changementMotPassEtConf',[AuthController::class,'changerMotPassEtConf']);
