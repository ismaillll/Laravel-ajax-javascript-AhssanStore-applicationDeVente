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

Route::get('/', function () {
    return view('loginindex');
});
Auth::routes();
$this->get('login', function () {return view('loginindex');})->name('login');
Route::get('/home', 'UserController@index')->name('home');
$this->post('login', 'Auth\LoginController@login');
//Route::resource('utilisateur','UtilisateurController');
Route::resource('fournisseur','FournisseurController');
Route::get('/fournisseur', 'FournisseurController@index')->name('fournisseur');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/search', 'FournisseurController@search')->name('search');
Route::get('/searchUser', 'UserController@search')->name('searchUser');
Route::get('/searchUserIfadmin', 'UserController@searchUserIfadmin')->name('searchUserIfadmin');
//Route::resource('fournisseur','FournisseurController');
Route::POST('addFournisseur','FournisseurController@create')->name('addFournisseur');
Route::POST('destroy','FournisseurController@destroy')->name('destroy');
//Route::get('/live_search', 'FournisseurController@index');
Route::get('/live_search/action', 'FournisseurController@action')->name('live_search.action');
//Route::POST('updateFournisseur','FournisseurController@updateFournisseur')->name('updateFournisseur');
Route::get('/profile', 'UserController@index')->name('profile');
Route::POST('addUser','UserController@create')->name('addUser');
Route::POST('destroyUser','UserController@destroy')->name('destroyUser');
//Route::POST('editUser','UserController@edit')->name('editUser');
//Route::POST('updateUser','UserController@update')->name('updateUser');
Route::get('/gstuser', 'UserController@indexUserpage')->name('gstuser');
Route::resource('users','UserController');

Route::get('/produit', 'ProduitController@index')->name('produit');
Route::resource('produits','ProduitController');
Route::POST('destroyProduit','ProduitController@destroy')->name('destroyProduit');
Route::POST('addProduit','ProduitController@create')->name('addProduit');
Route::get('/searchPrd', 'ProduitController@search')->name('searchPrd');
/*Route::group(['prefix' => 'users'], function() {
  Route::match(['get', 'post'], 'create', 'UserController@create');
  Route::match(['get', 'put'], 'update/{id}', 'UserController@update');
  Route::get('show/{id}', 'UserController@show');
  Route::delete('delete/{id}', 'UserController@destroy');
});*/
Route::resource('ventes','VenteController');
Route::get('/ventes', 'VenteController@index')->name('ventes');
Route::POST('destroyVente','VenteController@destroy')->name('destroyVente');
Route::get('/searchVente', 'VenteController@search')->name('searchVente');
Route::get('ajouterVente','VenteController@ajouter')->name('ajouterVente');
Route::POST('/addVente', 'VenteController@create')->name('addVente');


Route::resource('marques','MarqueController');
Route::get('/marques', 'MarqueController@index')->name('marques');
Route::get('ajouterMarque','MarqueController@ajouter')->name('ajouterMarque');
Route::POST('addMarque','MarqueController@create')->name('addMarque');
Route::POST('destroyMarque','MarqueController@destroy')->name('destroyMarque');
//Route::POST('editMarque/{id}/edit','VenteController@edit');
Route::get('/searchMarque', 'MarqueController@search')->name('searchMarque');

Route::resource('categories','CategorieController');
Route::get('/categories', 'CategorieController@index')->name('categories');
Route::get('ajouterCategorie','CategorieController@ajouter')->name('ajouterCategorie');
Route::POST('addCategorie','CategorieController@create')->name('addCategorie');
Route::POST('destroyCategorie','CategorieController@destroy')->name('destroyCategorie');
Route::get('/searchCategorie', 'CategorieController@search')->name('searchCategorie');
Route::get('/venteForUser/{id}', 'VenteController@venteForUser')->name('venteForUser');

Route::get('dashboard','DashboardController@index')->name('dashboard');
