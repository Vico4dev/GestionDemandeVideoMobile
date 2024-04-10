<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController; // Modification ici

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
    return redirect('/demandes');
});

Auth::routes();


Route::resource('demandes', DemandeController::class); // Modification ici
Route::get('demandes/{demande}/pdf', 'DemandeController@exportPdf')->name('demandes.exportPdf');
