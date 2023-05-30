<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArrondissementController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\AutoController;
use App\Http\Controllers\Admin\CommuneController;
use App\Http\Controllers\Admin\SecteurController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\RecipiceController;
use Illuminate\Support\Facades\URL;

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

if (!empty($proxy_url)) {
    URL::forceRootUrl($proxy_url);
 }
 
 if (!empty($proxy_schema)) {
    URL::forceScheme($proxy_schema); 
 }
 
Route::get('/', [MainController::class, 'index'])->name('front-index');
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('loginAdmin');
Route::get('/dashboardUser', [MainController::class, 'demandes'])->name('demandesfront');
//Route::get('/demandes/create', [MainController::class, 'createdemande'])->name('adddemande');
Route::get('/demandes/liste', [MainController::class, 'liste'])->name('listedemande');
Route::group(['prefix' => 'usager', 'middleware' => ['auth']], function () {
   
   // Route::get('/demandes/liste', [MainController::class, 'liste'])->name('listedemande');
    // Route::get('/demandes/traitement', [MainController::class,'demandetraitement'])->name('demandetraitement');
    Route::get('/demandes/create', [MainController::class, 'createdemande'])->name('adddemande');
    Route::post('/demandes/store', [MainController::class, 'storedemande'])->name('store-demande');
    // Route::get('/demandes/{uuid}', [MainController::class, 'showdemande'])->name('show-demande');
    Route::get('/demandes/show/{uuid}', [MainController::class, 'showdemande'])->name('show-demande');
    Route::get('/demandes/edit/{uuid}', [MainController::class, 'editdemande'])->name('edit-demande');
    Route::PATCH('/demandes/update/{uuid}', [MainController::class, 'updatedemande'])->name('update-demande');
    Route::delete('/demandes/delete/{uuid}', [MainController::class, 'deletedemande'])->name('delete-demande');

    Route::post('demandes/{demande}/payement', [PayementController::class, 'store'])->name('payement');
    Route::patch('demandes/complement/{uuid}', [MainController::class, 'complement'])->name('complement');

    Route::get('demandes/candidat-selectionnee', [MainController::class, 'selectionnee'])->name('liste-selectionnee');

    Route::get('demande/recipice/{uuid}', [RecipiceController::class, 'htmlView'])->name('recipice');
});
//Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'admin', 'name' => 'admin.', 'middleware' => ['auth:admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logoutadmin');
    Route::get('/demandes', [DemandeController::class, 'index'])->name('demandes');
    Route::get('/utilisateurs', [AdminController::class, 'utilisateur'])->name('users');
    Route::get('/utilisateurs/create', [AdminController::class, 'create'])->name('addusers');
    Route::post('/utilisateurs/store', [AdminController::class, 'store'])->name('saveusers');
    Route::get('/utilisateurs/show/{uuid}', [AdminController::class, 'show'])->name('showusers');
    Route::get('/utilisateurs/edit/{uuid}', [AdminController::class, 'edit'])->name('edit-user');
    Route::patch('/utilisateurs/update/{uuid}', [AdminController::class, 'update'])->name('update-user');
    Route::patch('/utilisateurs/updateuser/{uuid}', [AdminController::class, 'updateUser'])->name('update-users');
    Route::patch('/utilisateurs/update-password/{uuid}', [AdminController::class, 'updatepassword'])->name('update-user-password');
    Route::delete('/utilisateurs/delete/{uuid}', [AdminController::class, 'destroy'])->name('delete-user');
    Route::get('/utilisateurs/regenererpassword/{uuid}', [AdminController::class, 'generepassword'])->name('regenerepassword');

    Route::get('/demandes/nouvelle-demande', [DemandeController::class, 'nouvelleDemande'])->name('demande-nouvelle');
    Route::get('/demandes/rejetee', [DemandeController::class, 'demandesrejet'])->name('demande-rejete');
    Route::get('/demandes/preselectionnee', [DemandeController::class, 'demandesPreselectionner'])->name('demande-preselectionnee');
    Route::get('/demandes/selectionnee', [DemandeController::class, 'demandesSelectionner'])->name('demande-selectionnee');
    Route::post('/demandes/status-change', [DemandeController::class, 'changestatusDemande'])->name('demnade-status');
    Route::get('/demandes/show/{uuid}', [DemandeController::class, 'showDemande'])->name('demande-show');
    Route::put('/demandes/transferer/{uuid}',  [DemandeController::class, 'transferer'])->name('demandes-transfert');
    Route::post('/demandes/transfert-multiple',  [DemandeController::class, 'multipleTransfere'])->name('demandes-transfert-multiple');





    Route::get('/auto-ecoles', [AutoController::class, 'index'])->name('autoecoles');
    Route::get('/auto-ecoles/add', [AutoController::class, 'create'])->name('add-ecole');
    Route::post('/auto-ecoles/store', [AutoController::class, 'store'])->name('store-ecole');
    Route::post('/auto-ecole/store', [AutoController::class, 'stores'])->name('store-ecoles');
    Route::get('/auto-ecoles/show/{uuid}', [AutoController::class, 'show'])->name('show-ecole');
    Route::get('/auto-ecoles/regenerer/{uuid}', [AutoController::class, 'regenererPassword'])->name('regenerepass');
    Route::get('/auto-ecoles/profile/{uuid}', [AutoController::class, 'profile'])->name('showautoecole');
    Route::get('/auto-ecoles/detail/{uuid}', [AutoController::class, 'show'])->name('show-ecoles');
    Route::get('/auto-ecoles/edit/{uuid}', [AutoController::class, 'edit'])->name('edit-ecole');
    Route::patch('/auto-ecoles/update/{uuid}', [AutoController::class, 'update'])->name('update-ecole');
    Route::delete('/auto-ecoles/delete/{uuid}', [AutoController::class, 'destroy'])->name('delete-ecole');
    Route::get('/auto-ecoles/candidats', [AutoController::class, 'candidatParecoles'])->name('candidatparecole');
    Route::get('/auto-ecoles/candidat/{uuid}', [AutoController::class, 'autosinglecandidat'])->name('show-candidat');
    Route::get('/auto-ecoles/candidats/code-valide', [AutoController::class, 'cadidatcodevalide'])->name('code-valide');
    Route::get('/auto-ecoles/candidats/crenau-valide', [AutoController::class, 'cadidatcrenauvalide'])->name('crenau-valide');
    Route::get('/auto-ecoles/candidats/conduite-valide', [AutoController::class, 'cadidatconduitevalide'])->name('conduite-valide');
    Route::get('/auto-ecoles/candidats/permis-valide', [AutoController::class, 'cadidatpermisvalide'])->name('permis-valide');
    Route::get('/auto-ecoles/candidats/abandon', [AutoController::class, 'cadidatabandon'])->name('abandon');
    Route::get('/auto-ecoles/candidats/abandonner/{uuid}', [AutoController::class, 'cadidatabandonner'])->name('candidat-abandonner');
    Route::post('/auto-ecoles/candidats/examen-save/{uuid}', [AutoController::class, 'ecolesaveExamen'])->name('examen-save');
    // Route:   :get('/auto-ecoles/candidats/rapport', [AutoController::class, 'rapport'])->name('auoto-rapport');
    Route::get('demandes/resultat/code', [DemandeController::class, 'resultat'])->name('resultat-code');
    Route::get('demandes/resultat/creneau', [DemandeController::class, 'resultat'])->name('resultat-creneau');
    Route::get('demandes/resultat/permis', [DemandeController::class, 'resultat'])->name('resultat-permis');

    Route::get('/sessions', [SessionController::class, 'index'])->name('session');
    Route::get('/sessions/add', [SessionController::class, 'create'])->name('add-session');
    Route::post('/sessions/store', [SessionController::class, 'store'])->name('store-session');
    Route::get('/sessions/show/{uuid}', [SessionController::class, 'show'])->name('show-session');
    Route::get('/sessions/edit/{uuid}', [SessionController::class, 'edit'])->name('edit-session');
    Route::patch('/sessions/update/{uuid}', [SessionController::class, 'update'])->name('update-session');
    Route::delete('/sessions/delete/{uuid}', [SessionController::class, 'destroy'])->name('delete-session');

    Route::get('/rapport', [DemandeController::class, 'rapportaccueil'])->name('rapport');
    Route::get('/rapport/{uuid}', [DemandeController::class, 'rapport'])->name('detail-rapport');

    Route::get('/regions', [RegionController::class, 'index'])->name('regions');
    Route::post('/region/store', [RegionController::class, 'store'])->name('add-region');
    Route::get('/region/edit/{uuid}', [RegionController::class, 'edit'])->name('edit-region');
    Route::Patch('/region/update/{uuid}', [RegionController::class, 'update'])->name('update-region');

    Route::get('/provinces', [RegionController::class, 'province'])->name('provinces');
    Route::post('/province/store', [RegionController::class, 'storeprovince'])->name('add-province');
    Route::get('/province/edit/{uuid}', [RegionController::class, 'show'])->name('edit-province');
    Route::patch('/province/update/{uuid}', [RegionController::class, 'updateProvince'])->name('update-province');

    Route::get('/communes', [CommuneController::class, 'index'])->name('communes');
    Route::post('/commune/store', [CommuneController::class, 'store'])->name('add-commune');
    Route::get('/commune/edit/{uuid}', [CommuneController::class, 'show'])->name('edit-commune');
    Route::patch('/commune/update/{uuid}', [CommuneController::class, 'update'])->name('update-commune');

    Route::get('/arrondissements', [ArrondissementController::class, 'index'])->name('arrondissements');
    Route::post('/arrondissement/store', [ArrondissementController::class, 'store'])->name('add-arrondissement');
    Route::get('/arrondissement/edit/{uuid}', [ArrondissementController::class, 'show'])->name('edit-arrondissement');
    Route::patch('/arrondissement/update/{uuid}', [ArrondissementController::class, 'update'])->name('update-arrondissement');

    Route::get('/secteurs', [SecteurController::class, 'index'])->name('secteurs');
    Route::post('/secteurs/store', [SecteurController::class, 'store'])->name('add-secteur');
    Route::get('/secteurs/edit/{uuid}', [SecteurController::class, 'show'])->name('edit-secteur');
    Route::patch('/secteurs/update/{uuid}', [SecteurController::class, 'update'])->name('update-secteur');

    Route::get('/villages', [VillageController::class, 'index'])->name('villages');
    Route::post('/villages/store', [VillageController::class, 'store'])->name('add-village');
    Route::get('/villages/edit/{uuid}', [VillageController::class, 'show'])->name('edit-village');
    Route::patch('/villages/update/{uuid}', [VillageController::class, 'update'])->name('update-village');

    Route::get('/parametre',                 [AdminController::class, 'parametre'])->name('parametre');
    Route::patch('/parametre/store/{id}',      [AdminController::class, 'updateparametre'])->name('update-parametre');

    Route::get('formations', [FormationController::class, 'index'])->name('formation');
    Route::post('formations/store', [FormationController::class, 'store'])->name('store-formation');
    Route::get('formations/edit/{uuid}', [FormationController::class, 'editFormation'])->name('edit-formation');
    Route::patch('formation/update/{uuid}', [FormationController::class, 'updateFormation'])->name('update-formation');
    Route::delete('formation/delete/{uuid}', [FormationController::class, 'destroy'])->name('delete-formation');

    Route::get('niveau', [FormationController::class, 'niveau'])->name('niveau');
    Route::post('niveau/store', [FormationController::class, 'storeNiveau'])->name('store-niveau');
    Route::get('niveau/edit/{uuid}', [FormationController::class, 'editNiveau'])->name('edit-niveau');
    Route::patch('niveau/update/{uuid}', [FormationController::class, 'updateNiveau'])->name('update-niveau');
    Route::delete('niveau/delete/{uuid}', [FormationController::class, 'destroyNiveau'])->name('delete-niveau');

    Route::get('diplomes', [FormationController::class, 'diplome'])->name('diplome');
    Route::post('diplome/store', [FormationController::class, 'storeDiplome'])->name('store-diplome');
    Route::get('diplome/edit/{uuid}', [FormationController::class, 'editDiplome'])->name('edit-diplome');
    Route::patch('diplome/update/{uuid}', [FormationController::class, 'updateDiplome'])->name('update-diplome');
    Route::delete('diplome/delete/{uuid}', [FormationController::class, 'destroyDiplome'])->name('delete-diplome');
});

    Route::get('/register',       [OauthController::class,'showRegistrationForm'])->name('register');
    Route::post('/inscription',       [OauthController::class,'register'])->name('inscription');

	Route::get('/connect',       [OauthController::class,'showLoginForm'])->name('login-page');
    Route::post('/login_user',       [OauthController::class,'login_user'])->name('login_user');

	Route::get('/callback',       [OauthController::class,'callback']) ;

	Route::post('/logout',        [OauthController::class,'logout'])->name('logout');

	Route::get('/edition-compte', [OauthController::class,'edition'])->name('oauth-compte');
// require __DIR__ . '/auth.php';


