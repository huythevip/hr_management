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
// Route::get('api_test', function (Request $request) {
//     dd($request->all());
//     return json_encode(
//         [
//             'error' => false,

//             'data' => [
//                 'a' => 'b'
//             ]
//         ]


// //        [
// //            'error' => true,
// //            'message' => 'Something wrong'
// //        ]
//     );
// });

// Route::post('departments', function(Request $request) {
//     //store
//     dd($request->all());
// });
