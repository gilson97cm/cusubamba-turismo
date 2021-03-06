<?php

#region URL´s ADMIN
Route::get('/', function () {
    return redirect()->route('home.user');
});

//Auth::routes();

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::get('/cusubamba-administrador', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function () {

    //province - canton -parish
    Route::get('cantons/{id}', 'Address\ProvinceController@getCanton')->name('cantons');
    Route::get('parishes/{id}', 'Address\ProvinceController@getParish')->name('parishes');

    #region NEWS
    Route::get('lista-de-noticias/', 'Admin\NewsController@index')->name('news.index')//
    ->middleware('permission:news.index');

    Route::get('publicar-noticia/', 'Admin\NewsController@create')->name('news.create')// vista del formulario crear
    ->middleware('permission:news.create');

    Route::post('grabar-noticia/', 'Admin\NewsController@store')->name('news.store')//
    ->middleware('permission:news.create');

    Route::get('editar-noticia/{news}/', 'Admin\NewsController@edit')->name('news.edit')// vista del formulario editar
    ->middleware('permission:news.edit');

    Route::put('actualizar-noticia/{news}/', 'Admin\NewsController@update')->name('news.update')//
    ->middleware('permission:news.edit');

    Route::get('ver-noticia/{news}/', 'Admin\NewsController@show')->name('news.show')// vista del detalle de la noticia
    ->middleware('permission:news.show');

    Route::delete('eliminar-noticia/{news}', 'Admin\NewsController@destroy')->name('news.destroy')//
    ->middleware('permission:news.destroy');

    Route::get('eliminar-noticia/{news}', function () { //evita el conflicto de rutas destroy
        return redirect()->route('home');
    });

    Route::get('noticias-inactivas/', 'Admin\NewsController@inactive')->name('news.inactive')
        ->middleware('permission:news.inactive');

    #endregion

    #region LEGENDS
    Route::get('lista-de-leyendas/', 'Admin\LegendController@index')->name('legends.index')//
    ->middleware('permission:legends.index');

    Route::get('publicar-leyenda/', 'Admin\LegendController@create')->name('legends.create')//vista del formulario crear
    ->middleware('permission:legends.create');

    Route::post('grabar-leyenda/', 'Admin\LegendController@store')->name('legends.store')//
    ->middleware('permission:legends.create');

    Route::get('editar-leyenda/{legends}/', 'Admin\LegendController@edit')->name('legends.edit')// vista del formulario editar leyenda
    ->middleware('permission:legends.edit');

    Route::put('actualizar-leyenda/{legends}/', 'Admin\LegendController@update')->name('legends.update')//
    ->middleware('permission:legends.edit');

    Route::get('ver-leyenda/{legends}/', 'Admin\LegendController@show')->name('legends.show')//
    ->middleware('permission:legends.show');

    Route::delete('eliminar-leyenda/{legends}', 'Admin\LegendController@destroy')->name('legends.destroy')//
    ->middleware('permission:legends.destroy');

    Route::get('eliminar-leyenda/{legends}', function () { //evita el conflicto de rutas destroy
        return redirect()->route('home');
    });

    #endregion

    #region CATEGORIES

    #region CATEGORY ACTIVITY

    Route::get('lista-de-categoria-de-actividades/', 'Admin\ActivityCategoriesController@index')->name('categoriesA.index')//
    ->middleware('permission:categoriesA.index');

    Route::post('grabar-categoria-de-actividades/', 'Admin\ActivityCategoriesController@store')->name('categoriesA.store')//
    ->middleware('permission:categoriesA.create');

    Route::put('editar-categoria-de-actividades/{category}/', 'Admin\ActivityCategoriesController@update')->name('categoriesA.update')//
    ->middleware('permission:categoriesA.edit');

    Route::delete('eliminar-categoria-de-actividades/{category}', 'Admin\ActivityCategoriesController@destroy')->name('categoriesA.destroy')//
    ->middleware('permission:categoriesA.destroy');

    Route::get('buscar-categoria-de-actividades/', 'Admin\ActivityCategoriesController@search')->name('categoriesA.search')//
    ->middleware('permission:categoriesA.search');

    #endregion

    #region CATEGORY PLACE
    Route::get('lista-de-categoria-de-lugares/', 'Admin\PlaceCategoriesController@index')->name('categoriesP.index')//
    ->middleware('permission:categoriesP.index');

    Route::post('grabar-categoria-de-lugares/', 'Admin\PlaceCategoriesController@store')->name('categoriesP.store')//
    ->middleware('permission:categoriesP.create');

    Route::put('editar-categoria-de-lugares/{category}/', 'Admin\PlaceCategoriesController@update')->name('categoriesP.update')//
    ->middleware('permission:categoriesP.edit');

    Route::delete('eliminar-categoria-de-lugares/{category}', 'Admin\PlaceCategoriesController@destroy')->name('categoriesP.destroy')//
    ->middleware('permission:categoriesP.destroy');

    Route::get('buscar-categoria-de-lugares/', 'Admin\PlaceCategoriesController@search')->name('categoriesP.search')//
    ->middleware('permission:categoriesP.search');

    #endregion

    #region CATEGORY EVENTS
    Route::get('lista-de-categoria-de-eventos/', 'Admin\EventCategoriesController@index')->name('categoriesE.index')//
    ->middleware('permission:categoriesE.index');

    Route::post('grabar-categoria-de-eventos/', 'Admin\EventCategoriesController@store')->name('categoriesE.store')//
    ->middleware('permission:categoriesE.create');

    Route::put('editar-categoria-de-eventos/{category}/', 'Admin\EventCategoriesController@update')->name('categoriesE.update')//
    ->middleware('permission:categoriesE.edit');

    Route::delete('eliminar-categoria-de-eventos/{category}', 'Admin\EventCategoriesController@destroy')->name('categoriesE.destroy')//
    ->middleware('permission:categoriesE.destroy');

    Route::get('buscar-categoria-de-eventos/', 'Admin\EventCategoriesController@search')->name('categoriesE.search')//
    ->middleware('permission:categoriesE.search');
    #endregion

    #endregion

    #region ACTIVITY
    Route::get('lista-de-actividades/', 'Admin\ActivityController@index')->name('activities.index')//
    ->middleware('permission:activities.index');

    Route::get('publicar-actividad/', 'Admin\ActivityController@create')->name('activities.create')// vista del formulario
    ->middleware('permission:activities.create');

    Route::post('grabar-actividad/', 'Admin\ActivityController@store')->name('activities.store')//
    ->middleware('permission:activities.create');

    Route::get('editar-actividad/{activity}/', 'Admin\ActivityController@edit')->name('activities.edit')// vista del formulario
    ->middleware('permission:activities.edit');

    Route::put('actualizar-actividad/{activity}/', 'Admin\ActivityController@update')->name('activities.update')//
    ->middleware('permission:activities.edit');

    Route::get('ver-actividad/{activity}/', 'Admin\ActivityController@show')->name('activities.show')//
    ->middleware('permission:activities.show');

    Route::delete('eliminar-actividad/{activity}', 'Admin\ActivityController@destroy')->name('activities.destroy')//
    ->middleware('permission:activities.destroy');

    Route::get('eliminar-actividad/{activity}', function () { //evita el conflicto de rutas destroy
        return redirect()->route('home');
    });

    #endregion

    #region PLACE
    Route::get('lista-de-lugares/', 'Admin\PlaceController@index')->name('places.index')//
    ->middleware('permission:places.index');

    Route::get('publicar-lugar/', 'Admin\PlaceController@create')->name('places.create')// vista del formulario
    ->middleware('permission:places.create');

    Route::post('grabar-lugar/', 'Admin\PlaceController@store')->name('places.store')//
    ->middleware('permission:places.create');

    Route::get('editar-lugar/{place}/', 'Admin\PlaceController@edit')->name('places.edit')// vista del formulario
    ->middleware('permission:places.edit');

    Route::put('actualizar-lugar/{place}/', 'Admin\PlaceController@update')->name('places.update')//
    ->middleware('permission:places.edit');

    Route::get('ver-lugar/{place}/', 'Admin\PlaceController@show')->name('places.show')//
    ->middleware('permission:places.show');

    Route::delete('eliminar-lugar/{place}', 'Admin\PlaceController@destroy')->name('places.destroy')//
    ->middleware('permission:places.destroy');

    Route::get('eliminar-lugar/{place}', function () { //evita el conflicto de rutas destroy
        return redirect()->route('home');
    });

    #endregion

    #region EVENT

    Route::get('lista -de-eventos/', 'Admin\EventController@index')->name('events.index')// vista de la lista de eventos
    ->middleware('permission:events.index');

    Route::get('eventos-calendario/', 'Admin\EventController@create')->name('events.create')//vista del calendario
    ->middleware('permission:events.create');

    //ACCIONES DEL CALENDARIO
    Route::post('grabar-evento/', 'Admin\EventController@store')->name('events.store')//
    ->middleware('permission:events.create');

    Route::get('eventos-registrados/{event?}/', 'Admin\EventController@show_in_calendar')->name('events.show')//
    ->middleware('permission:events.show');

    Route::post('actualizar-evento', 'Admin\EventController@update')->name('events.update')//
    ->middleware('permission:events.edit');

    Route::post('actualizar-evento-form', 'Admin\EventController@updateForm')->name('events.update')//
    ->middleware('permission:events.edit');

    Route::post('eliminar-evento', 'Admin\EventController@destroy')->name('events.destroy')//
    ->middleware('permission:events.destroy');

    Route::get('eliminar-evento/{event}', function () { //evita el conflicto de rutas destroy
        return redirect()->route('home');
    });

    //CCIONES DE LA TABLA
    Route::delete('eliminar-evento-lista/{event}', 'Admin\EventController@destroy_list')->name('events.destroy.list')//
    ->middleware('permission:events.destroy');

    Route::delete('detalle-del-evento/{event}', 'Admin\EventController@show_list')->name('events.show.list')//
    ->middleware('permission:events.show');

    #endregion

    #region USERS
    Route::get('lista-de-usuarios/', 'Admin\UserController@index')->name('users.index')//
    ->middleware('permission:users.index');

    Route::get('agregar-usuario/', 'Admin\UserController@create')->name('users.create')//
    ->middleware('permission:users.create');

    Route::post('grabar-usuario/', 'Admin\UserController@store')->name('users.store')//
    ->middleware('permission:users.create');

    Route::get('lista-de-usuarios-inactivos/', 'Admin\UserController@inactive')->name('users.inactive')//
    ->middleware('permission:users.inactive');

    Route::get('ver-usuario/{user}', 'Admin\UserController@show')->name('users.show')//
    ->middleware('permission:users.show');

    Route::get('editar-usuario/{user}', 'Admin\UserController@edit')->name('users.edit')//
    ->middleware('permission:users.edit');

    Route::put('actalizar-empleado/{user}', 'Admin\UserController@update')->name('users.update')//
    ->middleware('permission:users.edit');

    Route::delete('eliminar-usuario/{user}', 'Admin\UserController@destroy')->name('users.destroy')//
    ->middleware('permission:users.destroy');

    Route::get('eliminar-evento/{event}', function () { //evita el conflicto de rutas destroy
        return redirect()->route('home');
    });

    Route::put('activar-usuario/{user}', 'Admin\UserController@active')->name('users.active')//
    ->middleware('permission:users.active');

    Route::get('activar-usuario/{user}', function () {
        return redirect()->route('home');
    });
    #endregion

    #region ROLES
    Route::get('lista-de-roles/', 'Admin\RoleController@index')->name('roles.index')//
    ->middleware('permission:roles.index');

    Route::get('crear-rol/', 'Admin\RoleController@create')->name('roles.create')//
    ->middleware('permission:roles.create');

    Route::post('grabar-rol/', 'Admin\RoleController@store')->name('roles.store')//
    ->middleware('permission:roles.create');

    Route::get('editar-rol/{role}', 'Admin\RoleController@edit')->name('roles.edit')//
    ->middleware('permission:roles.edit');

    Route::put('actualizar-rol/{role}/', 'Admin\RoleController@update')->name('roles.update')//
    ->middleware('permission:roles.edit');

    Route::get('ver-rol/{role}', 'Admin\RoleController@show')->name('roles.show')//
    ->middleware('permission:roles.show');

    Route::delete('eliminar-rol/{role}', 'Admin\RoleController@destroy')->name('roles.destroy')//
    ->middleware('permission:roles.destroy');

    #endregion


});

#endregion

#region RIL´s USER
Route::get('/cusubamba', 'User\HomeController@index')->name('home.user');
#endregion
