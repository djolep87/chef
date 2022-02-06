<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/ingredients', 'IngredientsController@index');

Route::get('/recipes', 'RecipesController@index');
Route::get('/createRecipes', 'RecipesController@create');
Route::get('/showRecipe/{id}', 'RecipesController@show');
Route::post('/createRecipes', 'RecipesController@store');


Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
