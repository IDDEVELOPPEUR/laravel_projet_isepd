<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inscription',[AuthController::class,'inscriptionPage']);
Route::get('/login',[AuthController::class,'connecterPage']);
Route::get('/forget',[AuthController::class,'forgetPage']);
Route::get('/reset',[AuthController::class,'reinitialisationPage']);
Route::get('/accueil',[AuthController::class,'accueilPage']);
Route::get('/les-etudiants',[EtudiantController::class,'etudiants']);


//pour les routes metieres
Route::post('/inscrire',[AuthController::class,'inscrire']);
Route::post('/connecter',[AuthController::class,'connecter']);
Route::post('/deconnexion',[AuthController::class,'deconnecter']);
