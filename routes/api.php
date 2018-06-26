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

//Login API
Route::post('/login', 'API\LoginApiController@login');


Route::group(['middleware' => 'auth:api'], function (){
    //Announcement API
    //get all the list
    Route::get('/announcements', 'API\AnnouncementApiController@index');
    //show selected announcement
    Route::get('announcements/{announcement}', 'API\AnnouncementApiController@show');

    //Bill API
    Route::get('/bills', 'API\BillApiController@bills');

    //User Data API
    Route::get('/userDetails', 'API\UserDataApiController@userDetails');

    //User Edit API
    Route::put('/userDetail', 'API\UserDataApiController@update');

    //User Change Password API
    Route::post('/changePass', 'API\UserDataApiController@changePassword');

    //Chat User
    Route::post('addChat', 'API\ConversationApiController@conversation');

    //Chat User
    Route::get('chat', 'API\ConversationApiController@chatUser');

    //Chat API
    Route::get('chat/{id}', 'API\ConversationApiController@getChat');
});

