<?php

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



Route::get('/', [
    'uses'=>'ChiefController@index',
    'as' => 'index'
]);
/** backend root */

Route::post('dashboard/login', 'AdminController@login');

Route::get('dashboard/logout', [
    'uses' => 'AdminController@logout',
    'as' => 'logout'
]);

Route::get('/backend', [
    'uses' => 'AdminController@backend',
    'as' => 'backend'
]);
Route::get('dashboard/add-chief', [
    'uses' => 'ChiefController@add',
]);
Route::get('dashboard/add-chantier', [
    'uses' => 'ChantierController@add'
]);
Route::get('dashboard/list-chief', [
    'uses' => 'ChiefController@list',
    'as' => 'all.chief'
]);
Route::get('dashboard/delete-chief/{id}', [
    'uses' => 'ChiefController@delete'
]);

Route::get('dashboard/dashboard', [
    'uses' => 'AdminController@dashboard',
    'as' => 'dash'
]);
Route::post('dashboard/add-chief', [
    'uses' => 'ChiefController@save'
]);
Route::post('dashboard/add-chantier', [
    'uses' => 'ChantierController@save'
]);
Route::get('dashboard/list-chantier', [
    'uses' => 'ChantierController@list',
    'as' => 'all.chantier'
]);
Route::get('dashboard/gmap', [
    'uses' => 'AdminController@gmaps'
]);
Route::get('dashboard/view-chantier/{id}', [
    'uses' => 'ChantierController@view'
]);
Route::get('dashboard/delete-chantier/{id}', [
    'uses' => 'ChantierController@delete'
]);

/** User Root */
Route::post('/login', 'ChiefController@login');

Route::get('/home', [
    'uses' => 'ChiefController@home',
    'as' => 'home'
]);
Route::get('/logout', [
    'uses' => 'ChiefController@logout',
]);
Route::get('/detail-chantier/{code}', [
    'uses' => 'ChiefController@detail',
    'as' => 'detail.chantier'
]);
Route::get('/profile', [
    'uses' => 'ChiefController@profile',
    'as' => 'edit.profile'
]);
Route::post('/updateprofile', [
    'uses' => 'ChiefController@update'
]);
Route::get('/etat-chantier/{id}', [
    'uses' => 'ChantierController@etat',
    'as' => 'etat'
]);
Route::post('/update-chantier', [
    'uses' => 'ChantierController@update'
]);

Route::get('/conversations',[
    'uses'=> 'conversationController@index',
    'as'=>'conversations'
]);

Route::get('/conversations/{user}', 'conversationController@show')
    ->name('conversations.show');
Route::post('/conversations/{user}', 'conversationController@store');


