<?php



Route::get('/', function () {
    return view('backend.admin.auth.login');
});

//Auth::routes();

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

//registro usuario
Route::get('register/', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

//province - canton -parish
Route::get('cantons/{name}','Address\ProvinceController@getCanton')->name('cantons');
Route::get('parishes/{name}','Address\ProvinceController@getParish')->name('parishes');

///

Route::get('/home', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function (){

    #region NEWS
    Route::post('news/store/', 'NewsController@store')->name('news.store')//
    ->middleware('permission:news.create');

    Route::get('news/all', 'NewsController@index')->name('news.index') //
    ->middleware('permission:news.index');

    Route::get('news/inactive', 'NewsController@inactive')->name('news.inactive') //
    ->middleware('permission:news.inactive');

    Route::get('news/create', 'NewsController@create')->name('news.create')//
    ->middleware('permission:news.create');

    Route::put('news/{news_id}/update', 'NewsController@update')->name('news.update') //
    ->middleware('permission:news.edit');

    Route::get('news/{news_id}/show', 'NewsController@show')->name('news.show')//
    ->middleware('permission:news.show');

    Route::delete('news/{news_id}', 'NewsController@destroy')->name('news.destroy')//
    ->middleware('permission:news.destroy');

    Route::get('news/{news_id}/edit', 'NewsController@edit')->name('news.edit')//
    ->middleware('permission:news.edit');
    #endregion

    #region CATEGORY ACTIVITY
    Route::post('categoriesA/store/', 'CategoryActivityController@store')->name('categoriesA.store')//
    ->middleware('permission:categoriesA.create');

    Route::get('categoriesA/all', 'CategoryActivityController@index')->name('categoriesA.index') //
    ->middleware('permission:categoriesA.index');

    Route::get('categoriesA/inactive', 'CategoryActivityController@inactive')->name('categoriesA.inactive') //
    ->middleware('permission:categoriesA.inactive');

    Route::get('categoriesA/create', 'CategoryActivityController@create')->name('categoriesA.create')//
    ->middleware('permission:categoriesA.create');

    Route::put('categoriesA/{activity}/update', 'CategoryActivityController@update')->name('categoriesA.update') //
    ->middleware('permission:categoriesA.edit');

    Route::get('categoriesA/{activity}/show', 'CategoryActivityController@show')->name('categoriesA.show')//
    ->middleware('permission:categoriesA.show');

    Route::delete('categoriesA/{activity}', 'CategoryActivityController@destroy')->name('categoriesA.destroy')//
    ->middleware('permission:categoriesA.destroy');

    Route::get('categoriesA/{activity}/edit', 'CategoryActivityController@edit')->name('categoriesA.edit')//
    ->middleware('permission:categoriesA.edit');
    #endregion

    #region CATEGORY PLACE
    Route::post('categoriesP/store/', 'CategoryPlaceController@store')->name('categoriesP.store')//
    ->middleware('permission:categoriesP.create');

    Route::get('categoriesP/all', 'CategoryPlaceController@index')->name('categoriesP.index') //
    ->middleware('permission:categoriesP.index');

    Route::get('categoriesP/inactive', 'CategoryPlaceController@inactive')->name('categoriesP.inactive') //
    ->middleware('permission:categoriesP.inactive');

    Route::get('categoriesP/create', 'CategoryPlaceController@create')->name('categoriesP.create')//
    ->middleware('permission:categoriesP.create');

    Route::put('categoriesP/{place}/update', 'CategoryPlaceController@update')->name('categoriesP.update') //
    ->middleware('permission:categoriesP.edit');

    Route::get('categoriesP/{place}/show', 'CategoryPlaceController@show')->name('categoriesP.show')//
    ->middleware('permission:categoriesP.show');

    Route::delete('categoriesP/{place}', 'CategoryPlaceController@destroy')->name('categoriesP.destroy')//
    ->middleware('permission:categoriesP.destroy');

    Route::get('categoriesP/{place}/edit', 'CategoryPlaceController@edit')->name('categoriesP.edit')//
    ->middleware('permission:categoriesP.edit');
    #endregion

    #region ACTIVITY
    Route::post('activities/store/', 'ActivityController@store')->name('activities.store')//
    ->middleware('permission:activities.create');

    Route::get('activities/all', 'ActivityController@index')->name('activities.index') //
    ->middleware('permission:activities.index');

    Route::get('activities/inactive', 'ActivityController@inactive')->name('activities.inactive') //
    ->middleware('permission:activities.inactive');

    Route::get('activities/create', 'ActivityController@create')->name('activities.create')//
    ->middleware('permission:activities.create');

    Route::put('activities/{activity}/update', 'ActivityController@update')->name('activities.update') //
    ->middleware('permission:activities.edit');

    Route::get('activities/{activity}/show', 'ActivityController@show')->name('activities.show')//
    ->middleware('permission:activities.show');

    Route::delete('activities/{activity}', 'ActivityController@destroy')->name('activities.destroy')//
    ->middleware('permission:activities.destroy');

    Route::get('activities/{activity}/edit', 'ActivityController@edit')->name('activities.edit')//
    ->middleware('permission:activities.edit');
    #endregion

    #region PLACE
    Route::post('places/store/', 'PlaceController@store')->name('places.store')//
    ->middleware('permission:places.create');

    Route::get('places/all', 'PlaceController@index')->name('places.index') //
    ->middleware('permission:places.index');

    Route::get('places/inactive', 'PlaceController@inactive')->name('places.inactive') //
    ->middleware('permission:places.inactive');

    Route::get('places/create', 'PlaceController@create')->name('places.create')//
    ->middleware('permission:places.create');

    Route::put('places/{place}/update', 'PlaceController@update')->name('places.update') //
    ->middleware('permission:places.edit');

    Route::get('places/{place}/show', 'PlaceController@show')->name('places.show')//
    ->middleware('permission:places.show');

    Route::delete('places/{place}', 'PlaceController@destroy')->name('places.destroy')//
    ->middleware('permission:places.destroy');

    Route::get('places/{place}/edit', 'PlaceController@edit')->name('places.edit')//
    ->middleware('permission:places.edit');
    #endregion

    #region LEGENDS
    Route::post('legends/store/', 'LegendController@store')->name('legends.store')//
    ->middleware('permission:legends.create');

    Route::get('legends/all', 'LegendController@index')->name('legends.index') //
    ->middleware('permission:legends.index');

    Route::get('legends/inactive', 'LegendController@inactive')->name('legends.inactive') //
    ->middleware('permission:legends.inactive');

    Route::get('legends/create', 'LegendController@create')->name('legends.create')//
    ->middleware('permission:legends.create');

    Route::put('legends/{legend}/update', 'LegendController@update')->name('legends.update') //
    ->middleware('permission:legends.edit');

    Route::get('legends/{legend}/show', 'LegendController@show')->name('legends.show')//
    ->middleware('permission:legends.show');

    Route::delete('legends/{legend}', 'LegendController@destroy')->name('legends.destroy')//
    ->middleware('permission:legends.destroy');

    Route::get('legends/{legend}/edit', 'LegendController@edit')->name('legends.edit')//
    ->middleware('permission:legends.edit');
    #endregion

    #region EMPLOYEE
    Route::post('employees/store/', 'EmployeeController@store')->name('employees.store')//
    ->middleware('permission:employees.create');

    Route::get('employees/all', 'EmployeeController@index')->name('employees.index') //
        ->middleware('permission:employees.index');

    Route::get('employees/inactive', 'EmployeeController@inactive')->name('employees.inactive') //
    ->middleware('permission:employees.inactive');

    Route::get('employees/create', 'EmployeeController@create')->name('employees.create')//
        ->middleware('permission:employees.create');

    Route::put('employees/{employee}/update', 'EmployeeController@update')->name('employees.update') //
        ->middleware('permission:employees.edit');

    Route::get('employees/{employee}/show', 'EmployeeController@show')->name('employees.show')//
        ->middleware('permission:employees.show');

    Route::delete('employees/{employee}', 'EmployeeController@destroy')->name('employees.destroy')//
        ->middleware('permission:employees.destroy');

    Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit')//
        ->middleware('permission:employees.edit');
    #endregion

    #region ROLES
    Route::post('roles/store', 'RoleController@store')->name('roles.store')//
        ->middleware('permission:roles.create');

    Route::get('roles/', 'RoleController@index')->name('roles.index') //
        ->middleware('permission:roles.index');

    Route::get('roles/create/', 'RoleController@create')->name('roles.create') //
        ->middleware('permission:roles.create');

    Route::put('roles/{role}/', 'RoleController@update')->name('roles.update') //
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}/info', 'RoleController@show')->name('roles.show') //
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')//
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')//
        ->middleware('permission:roles.edit');
    #endregion



});
