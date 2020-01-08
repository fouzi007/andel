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


Route::middleware('api')->get('/users', function(){
  return \App\User::all()->map(function($user){
    return [
      'name' => strtoupper($user->name),
      'email' => $user->email,
      'dates' => [
      'created_at' => $user->created_at->diffForHumans(),
      'updated_at' => $user->updated_at->diffForHumans(),
      ]
    ];
  });
});
