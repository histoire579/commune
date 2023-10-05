<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TchatController;
use Gloudemans\Shoppingcart\Facades\Cart;

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

/* Route::get('/', function () {
    return view('menu');
}); */
Route::get('/', [App\Http\Controllers\AccueilController::class, 'index']);  

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user
Route::get('/inscription', [App\Http\Controllers\UserController::class, 'index'])->name('inscription');
Route::post('/inscription', [App\Http\Controllers\UserController::class, 'Register']);
Route::post('/connecter', [App\Http\Controllers\UserController::class, 'Login'])->name('connecter');
Route::post('/deconnecter', [App\Http\Controllers\UserController::class, 'Deconnexion'])->name('deconnecter');
Route::get('/retour', [App\Http\Controllers\UserController::class, 'Retour'])->name('retour');

//handicape
Route::get('/handicape', [App\Http\Controllers\HandicapeController::class, 'index'])->name('handicape');
Route::get('/handicape-search', [App\Http\Controllers\HandicapeController::class, 'search1'])->name('search');
Route::get('/handicape-edit/{id}', [App\Http\Controllers\HandicapeController::class, 'edit'])->name('edit')->middleware(['ajax']);

//acteur
Route::get('/acteur', [App\Http\Controllers\ActeurController::class, 'index'])->name('acteur');
Route::get('/acteur-search', [App\Http\Controllers\ActeurController::class, 'search'])->name('acteur.search');
Route::get('/acteur-edit/{id}', [App\Http\Controllers\ActeurController::class, 'edit'])->name('acteur.edit')->middleware(['ajax']);

//acteur
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/service-search', [App\Http\Controllers\ServiceController::class, 'search'])->name('service.search');
Route::get('/service-edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit')->middleware(['ajax']);

//commune handicap
Route::get('/commune-{slug}', [App\Http\Controllers\CommuneController::class, 'index'])->name('commune.info');
Route::get('/handicap-yaounde-{commune}', [App\Http\Controllers\CommuneController::class, 'Handicap'])->name('commune.handicap');
Route::get('/handicap/commune/search', [App\Http\Controllers\HandicapeController::class, 'searchByCommune'])->name('handicap.commune.search');

//commune acteur
Route::get('/acteur-yaounde-{commune}', [App\Http\Controllers\CommuneController::class, 'Acteur'])->name('commune.acteur');
Route::get('/acteur/commune/search', [App\Http\Controllers\ActeurController::class, 'searchByCommune'])->name('acteur.commune.search');

//commune service
Route::get('/service-yaounde-{commune}', [App\Http\Controllers\CommuneController::class, 'Service'])->name('commune.service');
Route::get('/service/commune/search', [App\Http\Controllers\ServiceController::class, 'searchByCommune'])->name('service.commune.search');

//quartier handicap
Route::get('/quartiers-{slug}', [App\Http\Controllers\QuartierController::class, 'index'])->name('quartier.info');
Route::get('/handicaps-yaounde-quartier-{quartier}', [App\Http\Controllers\QuartierController::class, 'Handicap'])->name('quartier.handicap');
Route::get('/handicaps/quartier/search', [App\Http\Controllers\HandicapeController::class, 'searchByQuartier'])->name('handicaps.quartier.search');

//quartier service
Route::get('/services-yaounde-quartier-{quartier}', [App\Http\Controllers\QuartierController::class, 'Service'])->name('quartier.service');
Route::get('/services/quartier/search', [App\Http\Controllers\ServiceController::class, 'searchByQuartier'])->name('services.quartier.search');

//quartier acteur
Route::get('/acteurs-yaounde-quartier-{quartier}', [App\Http\Controllers\QuartierController::class, 'Acteur'])->name('quartier.acteur');
Route::get('/acteurs/quartier/search', [App\Http\Controllers\ActeurController::class, 'searchByQuartier'])->name('acteurs.quartier.search');


// profil
Route::get('/profil', [App\Http\Controllers\HomeController::class, 'Profil'])->name('user.profil');
Route::post('/profil-update-user', [App\Http\Controllers\HomeController::class, 'UpdateUser'])->name('user.profil.update');
Route::post('/profil-update-password', [App\Http\Controllers\HomeController::class, 'UpdateUserPassword'])->name('user.profil.update.password');
Route::get('/user-deconnexion', [App\Http\Controllers\HomeController::class, 'Deconnexion'])->name('user.deconnexion');

//ckeditor
//Route::post('ckeditor/image_upload', 'CKEditorController@store')->name('upload');
Route::post('/ckeditor/image_upload', [App\Http\Controllers\CKEditorController::class, 'store'])->name('upload');
Route::post('/tiny/image_upload', [App\Http\Controllers\CKEditorController::class, 'create'])->name('upload_image');

//thematique
Route::get('/qualite-service-thematique-{theme}', [App\Http\Controllers\QualiteController::class, 'index'])->name('qualite.service.thematique');
Route::get('/qualite/service/thematique', [App\Http\Controllers\QualiteController::class, 'Search'])->name('qualite.search');

Route::post('/contacts', [App\Http\Controllers\ContactController::class, 'Send'])->name('contacts');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

//thematique
Route::get('/condition-generale-utilisation', [App\Http\Controllers\PageController::class, 'index'])->name('condition.generale');

Route::namespace('App\Http\Controllers\Admin')->group(function ()
{
    //login
    Route::get('/administration', function (){
        return redirect('/administration/login');
    });
    Route::get('/administration/login','Auth\LoginController@showLoginForm')->name('administration.login');
    Route::post('/administration/login', 'Auth\LoginController@login');

    //register
    Route::get('/administration/register', 'Auth\RegisterController@showRegistrationForm')->name('administration.register');
    Route::post('/administration/register', 'Auth\RegisterController@register');

    Route::get('/administration/home','AdminController@index')->name('administration.home');
    //logout
    Route::post('/administration/logout', 'Auth\LoginController@logout')->name('administration.logout');
    

    Route::middleware(['auth:admin','role:admin'])->group(function(){
        Route::get('/administration/private', function () {
            return 'bonjour super';
        });
        
    });

    

    Route::middleware(['auth:admin','role:super'])->group(function(){
        Route::get('/administration/user', 'UserController@index')->name('administration.user');
        Route::post('/administration/user', 'UserController@register');

        Route::get('/administration/user-add', 'UserController@Add')->name('administration.user.add');
        Route::get('/administration/user/destroy/{id}','UserController@destroy')->name('administration.user.delete');
        
    });

    Route::get('/administration/info', function () {
        return view('admin.info');
    });
     //categories route
     Route::get('/administration/categorie','CategorieController@index')->name('administration.categorie');
     Route::post('/administration/categorie','CategorieController@store');
     Route::get('/administration/categorie-add','CategorieController@Add')->name('administration.categorie.add');
     Route::get('/administration/categorie/edit/{id}','CategorieController@edit')->name('administration.categorie.edit');
     Route::post('/administration/categorie/edit/{id}','CategorieController@update');
     Route::get('/administration/categorie/destroy/{id}','CategorieController@destroy')->name('administration.categorie.delete');
    // image route

    //commune
    Route::get('/administration/commune','CommuneController@index')->name('administration.commune');
     Route::post('/administration/commune','CommuneController@store');
     Route::get('/administration/commune-add','CommuneController@Add')->name('administration.commune.add');
     Route::get('/administration/commune-edit/{id}','CommuneController@edit')->name('administration.commune.edit');
     Route::post('/administration/commune-edit/{id}','CommuneController@update');
     Route::get('/administration/commune/destroy/{id}','CommuneController@destroy')->name('administration.commune.delete');

     //quartier
    Route::get('/administration/quartier','QuartierController@index')->name('administration.quartier');
    Route::post('/administration/quartier','QuartierController@store');
    Route::get('/administration/quartier-add','QuartierController@Add')->name('administration.quartier.add');
    Route::get('/administration/quartier-edit/{id}','QuartierController@edit')->name('administration.quartier.edit');
    Route::post('/administration/quartier-edit/{id}','QuartierController@update');
    Route::get('/administration/quartier/destroy/{id}','QuartierController@destroy')->name('administration.quartier.delete');
    Route::get('/administration/getQuartierByCommune','QuartierController@getQuartierByCommune')->name('administration.getQuartierByCommune');
    Route::get('/administration/quartier-search','QuartierController@Search')->name('administration.quartier.search');

     //type
    Route::get('/administration/type','TypeController@index')->name('administration.type');
    Route::post('/administration/type','TypeController@store');
    Route::get('/administration/type-add','TypeController@Add')->name('administration.type.add');
    Route::get('/administration/type-edit/{id}','TypeController@edit')->name('administration.type.edit');
    Route::post('/administration/type-edit/{id}','TypeController@update');
    Route::get('/administration/type/destroy/{id}','TypeController@destroy')->name('administration.type.delete');

     //categorie-acteur
     Route::get('/administration/categorie-acteur','CategorieActeurController@index')->name('administration.categorie.acteur');
     Route::post('/administration/categorie-acteur','CategorieActeurController@store');
     Route::get('/administration/categorie-acteur-add','CategorieActeurController@Add')->name('administration.categorie.acteur.add');
     Route::get('/administration/categorie-acteur-edit/{id}','CategorieActeurController@edit')->name('administration.categorie.acteur.edit');
     Route::post('/administration/categorie-acteur-edit/{id}','CategorieActeurController@update');
     Route::get('/administration/categorie-acteur/destroy/{id}','CategorieActeurController@destroy')->name('administration.categorie.acteur.delete');

      //categorie-service
      Route::get('/administration/categorie-service','CategorieServiceController@index')->name('administration.categorie.service');
      Route::post('/administration/categorie-service','CategorieServiceController@store');
      Route::get('/administration/categorie-service-add','CategorieServiceController@Add')->name('administration.categorie.service.add');
      Route::get('/administration/categorie-service-edit/{id}','CategorieServiceController@edit')->name('administration.categorie.service.edit');
      Route::post('/administration/categorie-service-edit/{id}','CategorieServiceController@update');
      Route::get('/administration/categorie-service/destroy/{id}','CategorieServiceController@destroy')->name('administration.categorie.service.delete');

      //handicape
    Route::get('/administration/handicape','HandicapeController@index')->name('administration.handicape');
    Route::post('/administration/handicape','HandicapeController@store');
    Route::get('/administration/handicape-add','HandicapeController@Add')->name('administration.handicape.add');
    Route::get('/administration/handicape-edit/{id}','HandicapeController@edit')->name('administration.handicape.edit');
    Route::post('/administration/handicape-edit/{id}','HandicapeController@update');
    Route::get('/administration/handicape/destroy/{id}','HandicapeController@destroy')->name('administration.handicape.delete')->middleware(['auth:admin','role:super']);
    Route::get('/administration/handicape-search','HandicapeController@Search')->name('administration.handicape.search');
    Route::post('/administration/handicape/save','HandicapeController@Save')->name('administration.handicape.save');

    //acteur
    Route::get('/administration/acteur','ActeurController@index')->name('administration.acteur');
    Route::post('/administration/acteur','ActeurController@store');
    Route::get('/administration/acteur-add','ActeurController@Add')->name('administration.acteur.add');
    Route::get('/administration/acteur-edit/{id}','ActeurController@edit')->name('administration.acteur.edit');
    Route::post('/administration/acteur-edit/{id}','ActeurController@update');
    Route::get('/administration/acteur/destroy/{id}','ActeurController@destroy')->name('administration.acteur.delete')->middleware(['auth:admin','role:super']);
    Route::get('/administration/acteur-search','ActeurController@Search')->name('administration.acteur.search');

    //service
    Route::get('/administration/service','ServiceController@index')->name('administration.service');
    Route::post('/administration/service','ServiceController@store');
    Route::get('/administration/service-add','ServiceController@Add')->name('administration.service.add');
    Route::get('/administration/service-edit/{id}','ServiceController@edit')->name('administration.service.edit');
    Route::post('/administration/service-edit/{id}','ServiceController@update');
    Route::get('/administration/service/destroy/{id}','ServiceController@destroy')->name('administration.service.delete')->middleware(['auth:admin','role:super']);
    Route::get('/administration/service-search','ServiceController@Search')->name('administration.service.search');

     //groupe
     Route::get('/administration/groupe','GroupeController@index')->name('administration.groupe');
     Route::post('/administration/groupe','GroupeController@store');
     Route::get('/administration/groupe-add','GroupeController@Add')->name('administration.groupe.add');
     Route::get('/administration/groupe-edit/{id}','GroupeController@edit')->name('administration.groupe.edit');
     Route::post('/administration/groupe-edit/{id}','GroupeController@update');
     Route::get('/administration/groupe/destroy/{id}','GroupeController@destroy')->name('administration.groupe.delete');

     //partenaire 
    Route::get('/administration/partenaire','PartenaireController@index')->name('administration.partenaire');
    Route::post('/administration/partenaire','PartenaireController@store');
    Route::get('/administration/partenaire/add','PartenaireController@Add')->name('administration.partenaire-add');
    Route::get('/administration/partenaire/edit/{id}','PartenaireController@edit')->name('administration.partenaire.edit');
    Route::post('/administration/partenaire/edit/{id}','PartenaireController@update');
    Route::get('/administration/partenaire/destroy/{id}','PartenaireController@destroy')->name('administration.partenaire.delete');

     //thematique 
     Route::get('/administration/thematique','ThemeController@index')->name('administration.thematique');
     Route::post('/administration/thematique','ThemeController@store');
     Route::get('/administration/thematique/add','ThemeController@Add')->name('administration.thematique-add');
     Route::get('/administration/thematique/edit/{id}','ThemeController@edit')->name('administration.thematique.edit');
     Route::post('/administration/thematique/edit/{id}','ThemeController@update');
     Route::get('/administration/thematique/destroy/{id}','ThemeController@destroy')->name('administration.thematique.delete');

      //qualite 
      Route::get('/administration/qualite','QualiteController@index')->name('administration.qualite');
      Route::post('/administration/qualite','QualiteController@store');
      Route::get('/administration/qualite/add','QualiteController@Add')->name('administration.qualite-add');
      Route::get('/administration/qualite/edit/{id}','QualiteController@edit')->name('administration.qualite.edit');
      Route::post('/administration/qualite/edit/{id}','QualiteController@update');
      Route::get('/administration/qualite/destroy/{id}','QualiteController@destroy')->name('administration.qualite.delete');

    //appreciation 
    Route::get('/administration/appreciation','AppreciationController@index')->name('administration.appreciation');
    Route::post('/administration/appreciation','AppreciationController@store');
    Route::get('/administration/appreciation/add','AppreciationController@Add')->name('administration.appreciation-add');
    Route::get('/administration/appreciation/edit/{id}','AppreciationController@edit')->name('administration.appreciation.edit');
    Route::post('/administration/appreciation/edit/{id}','AppreciationController@update');
    Route::get('/administration/appreciation/destroy/{id}','AppreciationController@destroy')->name('administration.appreciation.delete');

     //page
     Route::get('/administration/page','PageController@index')->name('administration.page');
     Route::post('/administration/page','PageController@store');
     Route::get('/administration/page/add','PageController@Add')->name('administration.page-add');
     Route::get('/administration/page/edit/{id}','PageController@edit')->name('administration.page.edit');
     Route::post('/administration/page/edit/{id}','PageController@update');
     Route::get('/administration/page/destroy/{id}','PageController@destroy')->name('administration.page.delete');

       //utilisateur
    Route::get('/administration/utilisateur','AdminController@UserList')->name('administration.utilisateur')->middleware(['auth:admin','role:super']);
    Route::get('/administration/utilisateur/activer/{user}','AdminController@Activer')->name('administration.utilisateur.activer');
    Route::get('/administration/utilisateur/deactiver/{user}','AdminController@Desactiver')->name('administration.utilisateur.deactiver');
    //Route::get('/administration/handicape/destroy/{id}','HandicapeController@destroy')->name('administration.handicape.delete')->middleware(['auth:admin','role:super']);
    Route::get('/administration/utilisateur-list-search','AdminController@Search')->name('administration.utilisateur.list.search');
});

Route::get('{any}', [App\Http\Controllers\AccueilController::class, 'index'])->where('any', '(.*)');  
//Route::get('{any}', ApplicationController::class)->where('any', '(.*)');

// route redirection
// Route::get('/job/edit/language/en', function (){
//     return redirect('/job');
// });
// Route::get('/job/edit/language/fr', function (){
//     return redirect('/job');
// });

