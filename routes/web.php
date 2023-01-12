<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\SecretaireController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' =>['isAdmin','auth']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::group(['prefix' => 'medecin', 'middleware' =>['isMedecin','auth']], function () {
    Route::get('dashboard', [MedecinController::class, 'index'])->name('medecin.dashboard');
});
    route::get('/editer/{id}', [SecretaireController::class, 'edit'])->name('editer');
    Route::group(['prefix' => 'secretaire', 'middleware' =>['isSecretaire','auth']], function () {
                 Route::get('dashboard', [SecretaireController::class, 'index'])->name('secretaire.dashboard');
                 Route::post('ajouterPatient',[SecretaireController::class,'ajoutPatient'])->name('patient');
                 Route::get('ajouterPatient', [SecretaireController::class, 'ajouter'])->name('secretaire.ajouterPatient');
                 Route::get('listerPatient', [SecretaireController::class, 'lister'])->name('secretaire.listerPatient');
                 route::post('modifier', [SecretaireController::class, 'update'])->name('update');
                 });
