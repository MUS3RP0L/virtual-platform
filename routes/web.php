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

Route::group(['middleware' => 'ec_legal'], function() {

  Route::get('legal_route',function(){

    return 'usuario es legal_route';
  });
});


Route::group(['middleware' => 'ec_aprobacion'], function() {

  Route::get('aprobacion_route',function(){

    return 'usuario es aprobacion_route';
  });
});

Route::group(['middleware' => 'ec_calificacion'], function() {

  Route::get('calificacion_route',function(){

    return 'usuario es calificacion_route';
  });
});

Route::group(['middleware' => 'ec_revision'], function() {

    Route::get('revision_route',function(){

    return 'usuario es revision_route';
    });

});


Route::group(['middleware' => 'ec_repeccion'], function() {

  Route::get('recepcion_route',function(){

    return 'usuario es recepcionista';
  });
});

//fondo de retiro

Route::group(['middleware' => 'rf_repeccion'], function() {

  Route::get('rf_recepcion_route',function(){

    return 'usuario es rf_recepcion_route';
  });
});

Route::group(['middleware' => 'rf_revision'], function() {

    Route::get('rf_revision_route',function(){

    return 'usuario es rf_revision_route';
    });

});

Route::group(['middleware' => 'rf_calificacion'], function() {

  Route::get('rf_calificacion_route',function(){

    return 'usuario es rf_calificacion_route';
  });
});

Route::group(['middleware' => 'rf_aprobacion'], function() {

  Route::get('rf_aprobacion_route',function(){

    return 'usuario es rf_aprobacion_route';
  });
});

Route::group(['middleware' => 'rf_legal'], function() {

  Route::get('rf_legal_route',function(){

    return 'usuario es rf_legal_route';
  });
});

Route::group(['middleware' => 'rf_archivo'], function() {

  Route::get('rf_archivo_route',function(){

    return 'usuario es rf_archivo_route';
  });
});



Route::group(['middleware' => 'administrador'], function() {

 Route::get('admin',function(){

  return 'usuario administrador';
  });

});