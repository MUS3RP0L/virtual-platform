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
    return view('welcome');
});
Route::get('test',function(){
	if(Auth::check())
        {
        	$user = Auth::user();
        	$rolUser = DB::table('role_user')->where('user_id','=',$user->id)->first();
        	$user_rol = $rolUser->role_id;
         	return $user_rol;   
        }
        else
       	{
       		return 'no esta autenticado';
       	}
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('ec_repeccion',function(){
//   return 'usuario  revision';
// });




Route::get('revision_route',function(){

    return 'usuario es revision_route';
  });

Route::group(['middleware' => 'ec_repeccion'], function() {

  Route::get('recepcion_route',function(){

    return 'usuario es recepcionista';
  });
});

Route::group(['middleware' => 'administrador'], function() {

 Route::get('admin',function(){

  return 'usuario administrador';
});

});