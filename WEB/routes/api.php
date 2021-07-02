<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConnexionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TypeInterventionController;
use App\Http\Controllers\Api\InterventionController;
use App\Http\Controllers\Api\AllergieAlimentaireController;
use App\Http\Controllers\Api\AllergieMedicamentController;
use App\Http\Controllers\Api\ContactUrgenceController;
use App\Http\Controllers\Api\DossierMedController;
use App\Http\Controllers\Api\GroupeSanguinController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });+

Route::prefix('/v1')->group(function () {
    Route::get('/', [ConnexionController::class, 'informations'])->name('api.informations.v1');
    Route::middleware('api')->group(function () {
        Route::prefix('/public')->group(function () {
            Route::post('/login', [ConnexionController::class, 'Login'])->name('api.login.connexion');
            Route::get('/logo', [ConnexionController::class, 'Logo'])->name('api.logo');
        });
    });

    Route::post('/token/verify', [ConnexionController::class, 'renewToken'])->name('token.verify');

    Route::middleware('auth:api')->group(function () {
        Route::prefix('/auth')->group(function () {
            Route::get('/logout', [ConnexionController::class, 'Logout'])->name('api.logout');
            Route::post('/position', [UserController::class, 'PositionGPS'])->name('api.position');

            Route::post('/interventions', [InterventionController::class, 'create'])->name('interventions.create');
            Route::get('/interventions/{latitude},{longitude}/{id}', [InterventionController::class, 'index'])->name('interventions.index');
            Route::get('/interventions/{id}', [InterventionController::class, 'show'])->name('interventions.show');
            Route::put('/interventions', [InterventionController::class, 'update'])->name('interventions.update');
            Route::delete('/interventions', [InterventionController::class, 'destroy'])->name('interventions.destroy');
            Route::put('/interventions/termine', [InterventionController::class, 'finIntervention'])->name('interventions.finIntervention');

            Route::get('/types', [TypeInterventionController::class, 'index'])->name('types.index');
            Route::get('/types/{id}', [TypeInterventionController::class, 'show'])->name('types.show');

            Route::get('/allergies/alimentaires', [AllergieAlimentaireController::class, 'index'])->name('allergies.alimentaire.index');
            Route::get('/allergies/alimentaires/{id}', [AllergieAlimentaireController::class, 'find'])->name('allergies.alimentaire.find');
            Route::post('/allergies/alimentaires/', [AllergieAlimentaireController::class, 'create'])->name('allergies.alimentaire.create');
            Route::put('/allergies/alimentaires/', [AllergieAlimentaireController::class, 'update'])->name('allergies.alimentaire.update');
            Route::delete('/allergies/alimentaires/', [AllergieAlimentaireController::class, 'destroy'])->name('allergies.alimentaire.destroy');

            Route::get('/allergies/medicaments', [AllergieMedicamentController::class, 'index'])->name('allergies.medicament.index');
            Route::get('/allergies/medicaments/{id}', [AllergieMedicamentController::class, 'find'])->name('allergies.medicament.find');
            Route::post('/allergies/medicaments/', [AllergieMedicamentController::class, 'create'])->name('allergies.medicament.create');
            Route::put('/allergies/medicaments/', [AllergieMedicamentController::class, 'update'])->name('allergies.medicament.update');
            Route::delete('/allergies/medicaments/', [AllergieMedicamentController::class, 'destroy'])->name('allergies.medicament.destroy');

            Route::get('/groupes-sanguins', [GroupeSanguinController::class, 'index'])->name('gs.index');

            Route::get('/contacts', [ContactUrgenceController::class, 'index'])->name('contacts.index');
            Route::get('/contacts/{id}', [ContactUrgenceController::class, 'show'])->name('contacts.show');
            Route::post('/contacts', [ContactUrgenceController::class, 'create'])->name('contacts.create');
            Route::put('/contacts', [ContactUrgenceController::class, 'update'])->name('contacts.update');
            Route::delete('/contacts', [ContactUrgenceController::class, 'destroy'])->name('contacts.destroy');

            Route::get('/dossiers/{id}', [DossierMedController::class, 'show'])->name('dossiers.show');
            Route::post('/dossiers', [DossierMedController::class, 'create'])->name('dossiers.create');
            Route::put('/dossiers', [DossierMedController::class, 'update'])->name('dossiers.update');
            Route::delete('/dossiers', [DossierMedController::class, 'destroy'])->name('dossiers.destroy');
        });
    });
});
Route::get('/', [ConnexionController::class, 'informations'])->name('api.informations');
