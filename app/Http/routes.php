<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::get('/', function () {
    return view('Student_Form');
});*/
// Route::group(['middleware' => ['web']], function () {
Route::get('/getCsrf',function(){
	return csrf_token();
});
Route::get('/', function() {
	 
	 return File::get(resource_path() . '\views\Student_Form.html');
});
Route::get('dropdowns/getBoards', 'DropdownController@Board');
Route::post('dropdowns/getFields', 'DropdownController@Field');
// });
?>