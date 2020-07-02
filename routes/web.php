<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*administration*/
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/employeeadd', 'Administration\employeeController@employeeAddView')->name('employeeAddView');
Route::post('/employeeadd', 'Administration\employeeController@employeeAdd')->name('employeeAdd');
Route::get('/employeelist', 'Administration\employeeController@employeeListView')->name('employeeListView');
Route::get('/employeeRemove/{id}','Administration\employeeController@employeeRemove')->name('employeeRemove');
Route::get('/employeeEdit/{id}','Administration\employeeController@employeeEditView')->name('employeeEditView');
Route::post('/employeeEdit','Administration\employeeController@employeeUpdate')->name('employeeUpdate');
Route::get('/employeeDetails/{id}','Administration\employeeController@employeeDetails')->name('employeeDetails');
Route::get('/employeeDetailsPdf/{id}','Administration\employeeController@employeeDetailsPdf')->name('employeeDetailsPdf');


/*administration ends*/
