<?php

use App\Http\Livewire\Admin\Award\Liste;
use App\Http\Livewire\Admin\Ticket\Liste as TicketListe;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
    // return view('welcome');
    return view('galaWelcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// les routes propre a l'administrateur

Route::middleware([
    'auth:sanctum',
    
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

   
    Route::group(['middleware' => ['role:Super@Administrateur']], function () {

        Route::get('/parametres', function () {
            return view('admin.parametres');
        })->name('admin.parametres');
    
        Route::post('/importExcel', 'App\Http\Controllers\ExcelController@importExcel')->name('importExcel');
        Route::post('/delete/allStudent', 'App\Http\Controllers\ExcelController@DeleteAllStudent')->name('delete.allStudent') ;
    
    
        Route::get('/gestionnaire', function(){
            return view('admin.gestionnaire') ;
        } )->name('admin.gestionnaire');

    });

    Route::group(['middleware' => ['role:Super@Administrateur|Administrateur']], function () {

        Route::get('/etudiant', function(){
            return view('admin.etudiant');
        })->name('admin.etudiants');
    
        Route::get('/create/nomine', 'App\Http\Controllers\NomineController@create')->name('admin.award.nomination') ;
    
        Route::post('/nominer', 'App\Http\Controllers\NomineController@store')->name('admin.award.nominer');
    
        Route::get('/liste/nomines', App\Http\Livewire\Admin\Award\Liste::class)->name('admin.award.liste') ;
    
    

    });
    


    Route::group(['middleware' => ['role:participant']], function () {

    //participants

    Route::post('/awards/categorie/vote',  'App\Http\Controllers\EtudiantController@index')->name('admin.award.liste_vote_categorie') ;
    Route::post('/awards/vote',  'App\Http\Controllers\EtudiantController@store')->name('admin.award.effectuer_vote') ;

    Route::post('/awards/remove/vote', 'App\Http\Controllers\EtudiantController@removeVote')->name('admin.award.remove_vote');

    Route::get('/awards/categories',  'App\Http\Controllers\VoteController@index')->name('admin.award.liste_categorie') ;

    });

    Route::group(['middleware' => ['role:Caissiere']], function () {

    Route::get('/tickets/create', 'App\Http\Controllers\TicketController@create')->name('admin.ticket.create') ;
    Route::get('/tickets/create/couple_interne', 'App\Http\Controllers\TicketController@createTCI')->name('admin.ticket.create.tci') ;
    Route::get('/tickets/create/couple_externe', 'App\Http\Controllers\TicketController@createTCE')->name('admin.ticket.create.tce') ;
    Route::get('/tickets/create/solo_interne', 'App\Http\Controllers\TicketController@createTSI')->name('admin.ticket.create.tsi') ;
    Route::get('/tickets/create/solo_externe', 'App\Http\Controllers\TicketController@createTSE')->name('admin.ticket.create.tse') ;
    Route::get('/tickets/create/couple_mixte', 'App\Http\Controllers\TicketController@createTCM')->name('admin.ticket.create.tcm') ;

    Route::post('/tickets/store/couple_interne', 'App\Http\Controllers\TicketController@storeInterneCouple')->name('admin.ticket.store.tci') ;
    Route::post('/tickets/store/couple_externe', 'App\Http\Controllers\TicketController@storeExterneCouple')->name('admin.ticket.store.tce') ;
    Route::post('/tickets/store/solo_interne', 'App\Http\Controllers\TicketController@storeInterneSolo')->name('admin.ticket.store.tsi') ;
    Route::post('/tickets/store/solo_externe', 'App\Http\Controllers\TicketController@storeExterneSolo')->name('admin.ticket.store.tse') ;
    Route::post('/tickets/store/couple_mixte', 'App\Http\Controllers\TicketController@storeMixteCouple')->name('admin.ticket.store.tcm') ;


    //tickets 
    Route::get('/tickets/index', TicketListe::class)->name('admin.ticket.liste') ;
    Route::get('/ticket/show/{id}', 'App\Http\Controllers\TicketController@getTicket')->name('admin.ticket.show') ;
    Route::get('/ticket/sendTicket/{id}', 'App\Http\Controllers\TicketController@sendTicketMail')->name('admin.ticket.send_mail') ;

    });

    Route::group(['middleware' => ['role:Controlleur']], function () {

    Route::get('/controle/index', 'App\Http\Controllers\ControlController@index')->name('admin.control.index');
    Route::post('/control/soumission', 'App\Http\Controllers\ControlController@Soumission')->name('qrcode.Soumission');
    
});

});


// Route::get('/test', function(){
//     return view('galaWelcome');
// });