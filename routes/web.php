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

Route::group([

		'middleware' => 'App\Http\Middleware\Auth',

], function(){


	/*FOURNISSEURS*/
Route::get('liste-fournisseur', 'FournisseursController@listeFournisseur')->name('liste-fournisseurs');

Route::get('add-fournisseur', 'FournisseursController@getAddFournisseur')->name('add-fournisseurs');

Route::post('add-fournisseur', 'FournisseursController@postAddFournisseur');

Route::get('edit-fournisseur/{id}', 'FournisseursController@getEditFournisseur')->name('edit-fournisseurs');

Route::post('edit-fournisseur/{id}', 'FournisseursController@postEditFournisseur')->name('edit-fournisseurs');

Route::post('destroy/{id}', 'FournisseursController@destroy')->name('destroy');
/*END FOURNISSEURS*/




/*CATEGORIE*/
Route::get('liste-categorie', 'CategoriesController@listeCategorie')->name('liste-categories');

Route::get('add-categorie', 'CategoriesController@getCategorie')->name('add-categories');

Route::post('add-categorie', 'CategoriesController@postCategorie')->name('add-categories');

Route::get('edit-categorie/{id}', 'CategoriesController@getEditCategorie')->name('edit-categories');

Route::post('edit-categorie/{id}', 'CategoriesController@postEditCategorie')->name('edit-categories');

Route::post('destroy/{id}', 'CategoriesController@destroy')->name('destroy');
/*END CATEGORIE*/





/*ARTICLE*/
Route::get('liste-article', 'ArticlesController@index')->name('liste-articles');

Route::get('add-article', 'ArticlesController@getArticle')->name('add-articles');

Route::post('add-article', 'ArticlesController@postArticle')->name('add-articles');

Route::get('edit-article/{id}', 'ArticlesController@getEditArticle')->name('edit-articles');

Route::post('edit-article/{id}', 'ArticlesController@postEditArticle')->name('edit-article');

Route::post('destroy/{slug}', 'ArticlesController@destroy')->name('destroy');
/*END ARTICLE*/


/*USERS*/
Route::get('liste-users', 'RegistersController@listeUsers')->name('liste-users')/*->middleware('can:voir-pages')*/;



Route::get('/edit-users{id}', 'RegistersController@getEditUsers')->name('edit-users');

Route::post('/edit-users{id}', 'RegistersController@postEditUsers')->name('edit-users');

Route::post('destroy/{id}', 'RegistersController@destroy')->name('destroy');

Route::get('statut/{id}', 'RegistersController@getStatut')->name('statut');
/*END USERS*/


//Deconnexion
Route::get('deconnexion', 'loginController@deconnexion')->name('deconnexion');



/*MON COMPTE*/
Route::get('/mon-compte', 'CompteController@accueil')->name('mon-compte');

Route::post('/modification-avatar', 'CompteController@modificationAvatar');

Route::post('/modification-mot-de-passe', 'CompteController@modificationMotDePasse')->name('modification-mot-de-passe');
/*END MON COMPTE*/

});

Route::get('accueil', 'AccueilController@accueil')->name('accueil');

//USERS
Route::get('add-users', 'RegistersController@getAddUsers')->name('add-users')/*->middleware('can:voir-pages')*/;

Route::post('add-users', 'RegistersController@postAddUsers')->name('add-users');
//END USERS

//Connexion
Route::get('login', 'loginController@getLogin')->name('login');

Route::post('login', 'loginController@postLogin');
//END CONNEXION





