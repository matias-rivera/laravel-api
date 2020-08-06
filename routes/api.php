<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


 Route::group([
    "prefix" => "v1",
    "namespace" => "Api\V1",
    "middleware" => ['auth:api']
    
    


], function(){  
    Route::apiResources([
        'posts' =>'PostsController',
        'users' => 'UsersController',
        'comments' => 'CommentsController'
        ]);
    Route::get('/posts/{post}/relationships/author' , 'PostsRelationshipController@author')->name('posts.relationships.author');
    Route::get('/posts/{post}/author' , 'PostsRelationshipController@author')->name('posts.author');


    Route::get('/posts/{post}/relationships/comments' , 'PostsRelationshipController@comments')->name('posts.relationships.comments');
    Route::get('/posts/{post}/comments' , 'PostsRelationshipController@comments')->name('posts.comments');


}); 

Route::post('login','Api\AuthController@login');
Route::post('signup','Api\AuthController@signup');

/* Route::group([
    "prefix" => "v2",
    "namespace" => "Api\V2"

], function(){

}); */