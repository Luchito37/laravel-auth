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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware("auth")
->namespace("Admin") //indica la cartella dove si trova il controller
->name("admin.") // aggiunge prima del nome di ogni rotta questo
->prefix("admin") // aggiunge prima di ogni URI questo prefisso
->group(function(){
    Route::get('/', 'HomeController@index')->name('index');


    Route::resource("posts", "PostController");
});