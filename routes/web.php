<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*administration*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/employeeadd', 'HomeController@employeeAddView')->name('employeeAddView');
Route::post('/employeeadd', 'HomeController@employeeAdd')->name('employeeAdd');
/*administration ends*/
