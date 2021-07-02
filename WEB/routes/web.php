<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\VerificationEmailController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ConnexionController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\Web\MenuController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\View\PublicController;
use App\Http\Controllers\Web\View\AuthController;
use App\Http\Controllers\Web\View\DashboardController;
use App\Http\Controllers\Web\InterventionController;
use App\Http\Controllers\Web\SubstanceController;
use App\Http\Controllers\Web\RayonController;
use App\Http\Controllers\Web\GroupeSanguinController;
use App\Http\Controllers\Web\DroitController;
use App\Http\Controllers\Web\AllergieAlimentaireController;
use App\Http\Controllers\Web\AllergieMedicamenteuseController;
use App\Http\Controllers\Web\TypeInterventionController;
use App\Http\Controllers\Web\VersionController;
use App\Http\Controllers\Web\ContactUrgenceController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('public.login');
    })->name('redirect-login');
    Route::prefix('/public')->group(function () {
        Route::get('/login', function () {
            return view('public.login');
        })->name('login');
        Route::post('/login', [ConnexionController::class, 'Login'])->name('login.connexion');

        Route::get('/password', function () {
            return view('public.reset');
        })->name('password');
        // Route::post('/password', [ResetPasswordController::class, 'reset'])->name('password.reset');

        Route::get('/password', [ResetPasswordController::class, 'showResetPassword'])->name('password');
        Route::post('/password', [ResetPasswordController::class, 'reset'])->name('password.reset');

        Route::get('/register', [PublicController::class, 'showRegister'])->name('register');
        Route::post('/register', [SignInController::class, 'createNewAccount'])->name('register.confirm');
    });
});

Route::prefix('/public/mobile')->group(function () {
    Route::get('/presentation', [PublicController::class, 'presentationMobile'])->name('mobile.presentation');
    Route::get('/ios', [PublicController::class, 'applicationIos'])->name('mobile.ios');
    Route::get('/android', [PublicController::class, 'applicationAndroid'])->name('mobile.android');
    Route::get('/instruction', [PublicController::class, 'instruction'])->name('application.instruction');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::get('/email/verify/{id}', [VerificationEmailController::class, 'verify'])->name('verification.verify');
        Route::get('/email/resend', [VerificationEmailController::class, 'resend'])->name('verification.resend');

        Route::get('/home', [MenuController::class, 'show'])->name('home');
        Route::get('/logout', [ConnexionController::class, 'logout'])->name('logout');
        Route::get('/profil', [AuthController::class, 'showProfil'])->name('profil');
        Route::post('/profil', [UserController::class, 'updateProfil'])->name('profil.update');
        Route::get('/interventions', [InterventionController::class, 'showInterventions'])->name('interventions');
        Route::post('/interventions/commentaires', [InterventionController::class, 'UpdateCommentaire'])->name('commentaire.update');
        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
        Route::get('/map', [DashboardController::class, 'showMap'])->name('map');

        Route::middleware(['auth', 'superadmin'])->group(function () {
            Route::get('/substances', [SubstanceController::class, 'showSubstances'])->name('substances');
            Route::post('/substances', [SubstanceController::class, 'create'])->name('substances.create');
            Route::put('/substances', [SubstanceController::class, 'update'])->name('substances.update');
            Route::delete('/substances', [SubstanceController::class, 'delete'])->name('substances.delete');

            Route::get('/rayons', [RayonController::class, 'showRayons'])->name('rayons');
            Route::post('/rayons', [RayonController::class, 'create'])->name('rayons.create');
            Route::put('/rayons', [RayonController::class, 'update'])->name('rayons.update');
            Route::delete('/rayons', [RayonController::class, 'delete'])->name('rayons.delete');

            Route::get('/groupes-sanguins', [GroupeSanguinController::class, 'showGroupes'])->name('groupes_sanguins');
            Route::post('/groupes-sanguins', [GroupeSanguinController::class, 'create'])->name('groupes_sanguins.create');
            Route::put('/groupes-sanguins', [GroupeSanguinController::class, 'update'])->name('groupes_sanguins.update');
            Route::delete('/groupes-sanguins', [GroupeSanguinController::class, 'delete'])->name('groupes_sanguins.delete');

            Route::get('/droits', [DroitController::class, 'showDroits'])->name('droits');
            Route::post('/droits', [DroitController::class, 'create'])->name('droits.create');
            Route::put('/droits', [DroitController::class, 'update'])->name('droits.update');
            Route::delete('/droits', [DroitController::class, 'delete'])->name('droits.delete');

            Route::get('/allergie-alimentaire', [AllergieAlimentaireController::class, 'showDroits'])->name('allergie_alimentaire');
            Route::post('/allergie-alimentaire', [AllergieAlimentaireController::class, 'create'])->name('allergie_alimentaire.create');
            Route::put('/allergie-alimentaire', [AllergieAlimentaireController::class, 'update'])->name('allergie_alimentaire.update');
            Route::delete('/allergie-alimentaire', [AllergieAlimentaireController::class, 'delete'])->name('allergie_alimentaire.delete');

            Route::get('/allergie-medicamenteuse', [AllergieMedicamenteuseController::class, 'showDroits'])->name('allergie_medicamenteuse');
            Route::post('/allergie-medicamenteuse', [AllergieMedicamenteuseController::class, 'create'])->name('allergie_medicamenteuse.create');
            Route::put('/allergie-medicamenteuse', [AllergieMedicamenteuseController::class, 'update'])->name('allergie_medicamenteuse.update');
            Route::delete('/allergie-medicamenteuse', [AllergieMedicamenteuseController::class, 'delete'])->name('allergie_medicamenteuse.delete');

            Route::post('/versions', [VersionController::class, 'create'])->name('versions.create');
            Route::put('/versions', [VersionController::class, 'update'])->name('versions.update');
            Route::delete('/versions', [VersionController::class, 'delete'])->name('versions.delete');
        });

        Route::get('/versions', [VersionController::class, 'showVersions'])->name('versions');

        Route::get('/users', [UserController::class, 'showUsers'])->name('users');
        // Route::post('/users', [UserController::class, 'create'])->name('users.create');
        Route::put('/users', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users', [UserController::class, 'delete'])->name('users.delete');
        Route::put('/users/shadowban', [UserController::class, 'shadowban'])->name('users.shadowban');
        Route::put('/users/deshadowban', [UserController::class, 'deshadowban'])->name('users.deshadowban');
        Route::put('/users/disponible', [UserController::class, 'disponible'])->name('users.disponible');
        Route::put('/users/indisponible', [UserController::class, 'indisponible'])->name('users.indisponible');
        Route::put('/users/droit', [UserController::class, 'droit'])->name('users.droit');

        Route::get('/interventions/types', [TypeInterventionController::class, 'show'])->name('types.show');
        Route::post('/interventions/types/nouveau', [TypeInterventionController::class, 'create'])->name('types.create');
        Route::post('/interventions/types', [TypeInterventionController::class, 'store'])->name('types.store');
        Route::put('/interventions/types', [TypeInterventionController::class, 'update'])->name('types.update');
        Route::delete('/interventions/types', [TypeInterventionController::class, 'destroy'])->name('types.destroy');

        Route::get('/contacts', [ContactUrgenceController::class, 'show'])->name('contacts.show');
        Route::post('/contacts/nouveau', [ContactUrgenceController::class, 'create'])->name('contacts.create');
        Route::post('/contacts', [ContactUrgenceController::class, 'store'])->name('contacts.store');
        Route::put('/contacts', [ContactUrgenceController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts', [ContactUrgenceController::class, 'destroy'])->name('contacts.destroy');
    });
});
