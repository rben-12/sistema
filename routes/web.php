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

Route::group(['middleware'=>'auth'], function(){
    Route::resources([
        'marcas' => 'MarcaController',
        'articulos' => 'ArticuloController',
        'departamentos' => 'DepartamentoController',
        'incidencias' => 'IncidenciaController',
        'documentos' => 'DocumentoController',
        'resguardos' => 'ResguardoController',
        'usuarios' => 'UserController'
    ]);
});

//Route::get('articulos', 'ArticuloController@detalles');
Route::get('/', function () {
    return view('auth/login');
})->middleware('guest');

Auth::routes([]);

Route::get('/home', 'HomeController@index')->name('home');
//subir archivos
Route::get('newdoc', 'StorageController@index');	
Route::post('storage/create', 'StorageController@save');

Route::get('storage/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/storage/'.$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (Storage::exists($archivo))
    {
      return response()->download($url);
    }
    //si no se encuentra lanzamos un error 404.
    abort(404);
});

Route::group(['prefix'=>'pdf', 'middleware'=>'auth'], function(){
    $this->get('/{tipo}', 'pdfController@index')->name('pdf');
    $this->get('/resguardo/{id}', 'pdfController@showH')->name('pdf_h');
    $this->get('/{buscado}/search', 'pdfController@busqueda')->name('pdf_search');
});

Route::get('/getArticulosToAdd', 'ResguardoController@get')
    ->name('articulos.get')
    ->middleware('auth');

Route::POST('/addArticuloToRes/', 'ResguardoController@addArtRes')
    ->name('artAddRes.add')
    ->middleware('auth');

Route::POST('/deleteArticuloToRes/{id}', 'ResguardoController@deleteArToRes')
    ->name('artDeleteRes.delete')
    ->middleware('auth');

Route::GET('/getLastResguardo', 'ResguardoController@getNoResguardo')
    ->name('getLastResguardo.get')
    ->middleware('auth');

Route::GET('/register', 'Auth\RegisterController@create')
    ->name('register.get')
    ->middleware('auth');

Route::POST('/register', 'Auth\RegisterController@store')
    ->name('register.post')
    ->middleware('auth');

Route::GET('/config', 'UserController@GetchangePwd')
    ->name('config.get')
    ->middleware('auth');

Route::PUT('/config/{id}', 'UserController@changePwd')
    ->name('config.put')
    ->middleware('auth');