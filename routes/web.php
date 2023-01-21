<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\Notification;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\FullCalendarController;
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
Route::get('dashboard', [Notification::class, 'envoiSMS'])->name('message');

Auth::routes();


    /*  Route Administrateur */
    Route::get('/ajoutSec', [AdminController::class, 'ajoutSec'])->name('ajouterSec');
    Route::post('/ajoutMedecin', [AdminController::class, 'ajoutMedecin'])->name('ajouterMedecin');
    Route::get('ajouterMedecin', [AdminController::class, 'ajouter'])->name('admin.medecin.ajouterMedecin');
    Route::group(['prefix' => 'admin', 'middleware' =>['isAdmin','auth']], function () {
                 Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
                 
                 Route::get('accueil', [AdminController::class, 'accueil'])->name('admin.accueil');
                 Route::get('statistique', [AdminController::class, 'statistique'])->name('admin.statistique');
                 Route::get('listerMedecin', [AdminController::class, 'listerMed'])->name('admin.medecin.listerMedecin');
                 Route::post('/modifier{id}', [AdminController::class, 'modifierUser'])->name('admin.medecin.modifier');
                 Route::get('/editUser{id}', [AdminController::class, 'editUser'])->name('admin.medecin.editer');
                 Route::get('/supprimer{id}', [AdminController::class, 'supprimer'])->name('admin.medecin.supprimer');
                 });
Route::group(['prefix' => 'medecin', 'middleware' =>['isMedecin','auth']], function () {
    Route::get('dashboard', [MedecinController::class, 'index'])->name('medecin.dashboard');
    Route::get('listerPatient', [MedecinController::class, 'lister'])->name('medecin.lister');
    route::get('ajouterRendezVous{id}', [MedecinController::class, 'getrendezVous'])->name('medecin.getrendezVous');
    route::post('ajouterRv{id}', [MedecinController::class, 'ajouteRV'])->name('medecin.rv');
    route::get('agenda', [MedecinController::class, 'agenda'])->name('medecin.agenda');
    route::get('listeRendezVous', [MedecinController::class, 'listerendezVous'])->name('medecin.listeRv');
    route::get('listeConsultation', [MedecinController::class, 'listeConsultation'])->name('medecin.listeconsult');
    route::get('ajouterConsultation{id}', [MedecinController::class, 'getconsultation'])->name('medecin.addconsultation');
    route::post('ajoutconsultation{id}', [MedecinController::class, 'ajouterCons'])->name('medecin.addcons');
});

    Route::group(['prefix' => 'secretaire', 'middleware' =>['isSecretaire','auth']], function () {
                 Route::get('dashboard', [SecretaireController::class, 'index'])->name('secretaire.dashboard');
                 Route::post('ajouterPatient',[SecretaireController::class,'ajoutPatient'])->name('patient');
                 Route::get('ajouterPatient', [SecretaireController::class, 'ajouter'])->name('secretaire.ajouterPatient');
                 Route::get('listerPatient', [SecretaireController::class, 'lister'])->name('secretaire.listerPatient');
                 route::post('modifier{id}', [SecretaireController::class, 'update'])->name('update');
                 route::get('editer{id}', [SecretaireController::class, 'edit'])->name('editer');
                 Route::get('modifierrendezVous{id}', [SecretaireController::class, 'modifierRV'])->name('secretaire.editRV');
                 Route::post('saverendezVous{id}', [SecretaireController::class, 'updateRV'])->name('secretaire.updateRV');
                 route::get('agenda', [SecretaireController::class, 'agenda'])->name('secretaire.agenda');
                 route::get('calendrier', [SecretaireController::class, 'getagenda'])->name('secretaire.getagenda');
                 route::get('ajouterRendezVous{id}', [SecretaireController::class, 'getrendezVous'])->name('secretaire.getrendezVous');
                 route::post('ajouterRv{id}', [SecretaireController::class, 'ajouteRV'])->name('secretaire.rv');
                 route::get('listerRendezVous', [SecretaireController::class, 'listerendezVous'])->name('secretaire.listerendezVous');
                 route::get('supprimerPatient{id}', [SecretaireController::class, 'supprimer'])->name('secretaire.supprimer');
                 route::get('supprimerRendezVous{id}', [SecretaireController::class, 'supprimerRv'])->name('secretaire.supprimerRv');
                 });
Route::get('/secretaire/calendrier', [FullCalendarController::class,'getEvent'])->name('getevent');
Route::get('/medecin/calendrier', [FullCalendarController::class,'agenda'])->name('medecin.getevent');


Route::post('/createevent',[FullCalendarController::class,'createEvent'])->name('createevent');

Route::post('/deleteevent',[FullCalendarController::class,'deleteEvent'])->name('deleteevent');
