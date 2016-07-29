<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// REST sans create store show et destroy
Route::resource('user', 'UserController',  ['except' => ['show', 'destroy']]);

//REST pour les cours sans show et destroy + ajout des accès au cours ainsi que des statistiques du cours
Route::resource('cours', 'CoursController', ['except' => ['show', 'destroy']]);
Route::get('cours/{id}/statistique', array('as' => 'cours.statistique', 'uses' => 'CoursController@statistique'));
Route::get('cours/{id}/acces', array('as' => 'cours.acces.edit', 'uses' => 'CoursController@acces'));
Route::post('cours/{id}/acces', array('as' => 'cours.acces.store', 'uses' => 'CoursController@storeAcces'));




// connexion pour les invites
Route::get('invite/login', array('as' => 'invite.connexion', 'uses' => 'Auth\InviteController@InviteConnexion'));
Route::post('invite/login', array('as' => 'invite.login', 'uses' => 'Auth\InviteController@InviteLogin'));
Route::get('invite/logout', array('as' => 'invite.logout', 'uses' => 'Auth\InviteController@InviteLogout'));
Route::get('invite', array('as' => 'invite', 'uses' => 'ScenarioInviteController@Invite'));


Route::get('profil', array('as' => 'profil', 'uses' =>'ProfilController@index'));
Route::get('profil/edit', array('as' => 'profil.edit', 'uses' => 'ProfilController@edit'));
Route::put('profil', array('as' => 'profil.update', 'uses' => 'ProfilController@update'));

Route::get('/', array('as' => 'home', 'uses' =>'ScenarioController@liste'));
Route::get('invite', array('as' => 'homeInvite', 'uses' =>'ScenarioInviteController@liste'));


// Scenario pour les joueurs authentifiés
Route::get('scenario', array('as' => 'scenarios', 'uses' =>'ScenarioController@liste'));
Route::post('scenario/s', array('as' => 'score', 'uses' =>'ScenarioController@score'));
Route::post('scenario/r', array('as' => 'scenario.store', 'uses' =>'ScenarioController@store'));
Route::post('scenario', 'ScenarioController@index');


// Scenario pour les joueurs invités
Route::get('invite/cours', array('as' => 'invite.cours', 'uses' =>'ScenarioInviteController@cours'));
Route::get('invite/scenario', array('as' => 'invite.scenarios', 'uses' =>'ScenarioInviteController@liste'));
Route::post('invite/scenario/s', array('as' => 'invite.score', 'uses' =>'ScenarioInviteController@score'));
Route::post('invite/scenario/r', array('as' => 'invite.store', 'uses' =>'ScenarioInviteController@store'));
Route::post('invite/scenario', 'ScenarioInviteController@index');



Route::get('score', array('as' => 'classement', 'uses' =>'ScoreController@classement'));
Route::get('score/{id}', array('as' => 'scoreStat', 'uses' =>'ScoreController@index'));

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

// Password Reset Routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

