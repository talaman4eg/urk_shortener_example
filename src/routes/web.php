<?php

use Illuminate\Support\Facades\Route;
use App\Models\Redirect;

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

Route::get('/', function (Redirect $redirect) {
    $r = Redirect::where('id', 1)->first();
    return view('index', ['name' => 'Mark', 'r' => r->short_code]);
});

Route::get('/{short_code}', function (Redirect $redirect, $short_code) {
    $r = Redirect::where('short_code', $short_code)->first();
    Route.redirect($r->url);
    
})->whereAlphaNumeric('short_code');
