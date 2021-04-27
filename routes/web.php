<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Auth::routes();
Route::prefix('a2sys')->group(function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	Route::get('/get-ouverture-caisse', 'HomeController@getOuvertureCaisse')->name('ouverture_caisse.get');
	Route::post('/ouvrir-caisse', 'HomeController@ouvrirCaisse')->name('caisse.ouvrir');
	Route::get('/list-approvisionnement', 'HomeController@listApprovisionnement')->name('approvisionnement.list');
	Route::get('/get-approvisionnement', 'HomeController@getApprovisionnement')->name('approvisionnement.get');
	Route::post('/save-approvisionnement', 'HomeController@saveApprovisionnement')->name('approvisionnement.save');
	Route::get('/list-depense', 'HomeController@listDepense')->name('depense.list');
	Route::get('/get-depense', 'HomeController@getDepense')->name('depense.get');
	Route::post('/save-depense', 'HomeController@saveDepense')->name('depense.save');
	Route::get('/get-fermeture-caisse', 'HomeController@getFermetureCaisse')->name('fermeture_caisse.get');
	Route::post('/fermer-caisse', 'HomeController@fermerCaisse')->name('caisse.fermer');
});

Route::prefix('a2sys/parametres')->group(function(){
	Route::get('/get-project-form', 'ParametreController@getProject')->name('project.get');
	Route::post('/save-project', 'ParametreController@saveProject')->name('project.save');
	Route::put('/update-project/{id}', 'ParametreController@updateProject')->name('project.update');
	Route::get('/get-type-approvisionnement-form', 'ParametreController@getTypeAppro')->name('type_approvisionnement.get');
	Route::post('/save-type-approvisionnement', 'ParametreController@saveTypeAppro')->name('type_approvisionnement.save');
	Route::put('/update-type-approvisionnement/{id}', 'ParametreController@updateTypeAppro')->name('type_approvisionnement.update');
	Route::get('/get-nature-depense-form', 'ParametreController@getTypeDep')->name('nature_depense.get');
	Route::post('/save-nature-depense', 'ParametreController@saveTypeDep')->name('nature_depense.save');
	Route::put('/update-nature-depense/{id}', 'ParametreController@updateTypeDep')->name('nature_depense.update');
	Route::get('/get-pole-form', 'ParametreController@getPole')->name('pole.get');
	Route::post('/store-pole', 'ParametreController@storePole')->name('pole.store');
	Route::put('/update-pole/{id}', 'ParametreController@updatePole')->name('pole.update');
	Route::get('/get-agent-form', 'ParametreController@getAgent')->name('agent.get');
	Route::post('/store-agent', 'ParametreController@storeAgent')->name('agent.store');
	Route::put('/update-agent/{id}', 'ParametreController@updateAgent')->name('agent.update');
	Route::get('/get-user-form', 'UserController@getUser')->name('user.get');
	Route::post('/store-user', 'UserController@storeUser')->name('user.store');
});

Route::prefix('a2sys/validations')->group(function(){
	Route::get('/get-depenses-to-validate', 'ValidationController@getDepenseToValidate')->name('depense_to_validate.get');
	Route::get('/show-depense/{id}', 'ValidationController@showDepense')->name('depense.show');
	Route::get('/validate-depense/{id}', 'ValidationController@validateDepense')->name('depense.validate');
	Route::get('/rejeter-depense/{id}', 'ValidationController@rejeterDepense')->name('depense.rejeter');
	Route::get('/get-approvisionnements-to-validate', 'ValidationController@getApprovisionnementToValidate')->name('approvisionnement_to_validate.get');
	Route::get('/show-approvisionnement/{id}', 'ValidationController@showApprovisionnement')->name('approvisionnement.show');
	Route::get('/validate-approvisionnement/{id}', 'ValidationController@validateApprovisionnement')->name('approvisionnement.validate');
	Route::get('/rejeter-approvisionnement/{id}', 'ValidationController@rejeterApprovisionnement')->name('approvisionnement.rejeter');
});