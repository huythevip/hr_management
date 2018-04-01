<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('department_column', 'HrController@department_column');
Route::get('staff_list', 'HrController@staff_list');
Route::post('staff_add', 'HrController@staff_add');
Route::post('staff_edit', 'HrController@staff_edit');
Route::post('staff_delete', 'HrController@staff_delete');
Route::get('staff_search', 'HrController@staff_search');
Route::post('department_delete', 'HrController@department_delete');

