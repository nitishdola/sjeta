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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout',['as' => 'admin.logout', 'uses' => 'AdminAuth\AuthController@logout']);

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin.home']);
});  


Route::group(['prefix'=>'budget-categories'], function() {
    Route::get('/create', [
        'as' => 'budget_category.create',
        'middleware' => ['admin'],
        'uses' => 'BudgetCategoriesController@create'
    ]);

    Route::post('/store', [
        'as' => 'budget_category.store',
        'middleware' => 'admin',
        'uses' => 'BudgetCategoriesController@store'
    ]);

    Route::get('/view-all', [
        'as' => 'budget_category.index',
        'middleware' => 'admin',
        'uses' => 'BudgetCategoriesController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'budget_category.edit',
        'middleware' => 'admin',
        'uses' => 'BudgetCategoriesController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'budget_category.update',
        'middleware' => 'admin',
        'uses' => 'BudgetCategoriesController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'budget_category.disable',
        'middleware' => 'admin',
        'uses' => 'BudgetCategoriesController@edit'
    ]);
});


Route::group(['prefix'=>'documents'], function() {
    Route::get('/upload', [
        'as' => 'documents.upload',
        'middleware' => ['admin'],
        'uses' => 'DocumentsController@upload'
    ]);
    Route::post('/upload', [
        'as' => 'documents.post.upload',
        'middleware' => ['admin'],
        'uses' => 'DocumentsController@doUpload'
    ]);
});

