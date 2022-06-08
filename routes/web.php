<?php

use App\Http\Controllers\prova;
use Illuminate\Support\Facades\Route;
use Meta as Meta;

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

/************ SEZIONE HOME, IN, OUT  ************/
Route::get('/login_signup', function () {
    if(session('Username') !== '')
        return redirect('logged_home');
    return view('login_signup');
});
Route::get('/', function(){
    session(['Username' => '']);
    return view('home');
});
Route::get('/home', function(){
    session(['Username' => '']);
    return view('home');
});
Route::post('/signup', 'App\Http\Controllers\SignUpController@signup');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/check_username/{username}', 'App\Http\Controllers\SignUpController@checkUsr');
Route::get('/logged_home', function(){ //rivedere uso si user, meglio session
    if(session('Username') !== '')
        return view('logged_home');
    return redirect('home');
});
Route::get('/load_home', function(){
    return Meta::all()->toArray();
});


/************ SEZIONE PREFERITI  ************/
Route::get('/favorites', function(){
    return view('favorites');
});
Route::get('fetch_favorites', 'App\Http\Controllers\FavoritesController@fetchFavorites');
Route::get('add_prefer/{destination}', 'App\Http\Controllers\FavoritesController@addFavorites');
Route::get('remove_prefer/{destination}', 'App\Http\Controllers\FavoritesController@deleteFavorites');

/************ SEZIONE RICERCA  ************/
Route::get('/search/{destination}', 'App\Http\Controllers\FavoritesController@checkFavorites');

Route::get('search_imgs/{destination}', 'App\Http\Controllers\SearchImgsController@search');

/******** TEST ********/
Route::get('/prova', function(){
    $mete = Meta::all();
    print_r(json_encode($mete->toArray()));
});
