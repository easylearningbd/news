<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomePageController@index');
Route::get('/category/{id}', 'ListingPageController@listing1');
Route::get('/author/{id}', 'ListingPageController@listing');
Route::get('/listing', 'ListingPageController@index');
Route::get('/details/{slug}', 'DetailsPageController@index')->name('details');
Route::post('/comments', 'DetailsPageController@comment');

Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/football', function () {
    return 'I love Football';
});
Route::get('/user/{id}/{name?}', function ($id,$name="Ariyan") {
    return 'Your id is '.$id. "and your name is ".$name;
})->where('id','[0-9]+');

Route::get('/world', 'HelloController@hello');
Route::get('/add', 'AddController@index');
Route::get('/about',['uses'=>'AboutController@about','as'=>'about']);
Route::view('/contact','contact');
Route::group(['prefix'=>'back','middleware'=>'auth'],function(){
       Route::get('/', 'Admin\DashboardController@index');
       Route::get('/category', 'Admin\CategoryController@index');
        Route::get('/category/create', 'Admin\CategoryController@create');
        Route::get('/category/edit', 'Admin\CategoryController@edit');

        Route::get('/permission', ['uses'=>'Admin\PermissionController@index','as'=>'permission-list', 'middleware'=> 'permission:Permission List|All'] );

        Route::get('/permission/create',['uses'=>'Admin\PermissionController@create','as'=>'permission-create', 'middleware'=> 'permission:Permission List|All'] );  

        Route::post('/permission/store', ['uses'=>'Admin\PermissionController@store','as'=>'permission-store', 'middleware'=> 'permission:Permission List|All'] ); 

 Route::get('/permission/edit/{id}',  ['uses'=>'Admin\PermissionController@edit','as'=>'permission-edit', 'middleware'=> 'permission:Permission List|All'] );  

 Route::put('/permission/edit/{id}', ['uses'=>'Admin\PermissionController@update','as'=>'permission-update', 'middleware'=> 'permission:Permission List|All'] );   

 Route::delete('/permission/delete/{id}', ['uses'=>'Admin\PermissionController@destroy','as'=>'permission-delete','middleware'=> 'permission:Permission List|All'] );


    Route::get('/roles', 'Admin\RoleController@index');
    Route::get('/roles/create', 'Admin\RoleController@create');
    Route::post('/roles/store', 'Admin\RoleController@store');
    Route::get('/roles/edit/{id}', ['uses'=>'Admin\RoleController@edit','as'=>'role-edit'] );
   Route::put('/roles/edit/{id}', ['uses'=>'Admin\RoleController@update','as'=>'role-update'] );
   Route::delete('/roles/delete/{id}', ['uses'=>'Admin\RoleController@destroy','as'=>'role-delete'] );

   Route::get('/author', 'Admin\AuthorController@index');
   Route::get('/author/create', 'Admin\AuthorController@create');
   Route::post('/author/store', 'Admin\AuthorController@store');
   Route::get('/author/edit/{id}', ['uses'=>'Admin\AuthorController@edit','as'=>'author-edit'] );
   Route::put('/author/edit/{id}', ['uses'=>'Admin\AuthorController@update','as'=>'author-update'] );
   Route::delete('/author/delete/{id}', ['uses'=>'Admin\AuthorController@destroy','as'=>'author-delete'] );


Route::get('/categroies', ['uses'=>'Admin\CategoryController@index','as'=>'category-list', 'middleware'=> 'permission:Category List|All'] );

Route::get('/category/create', ['uses'=>'Admin\CategoryController@create','as'=>'category-create', 'middleware'=> 'permission:Category Create|All'] );

Route::post('/category/store', ['uses'=>'Admin\CategoryController@store','as'=>'category-store', 'middleware'=> 'permission:Category Store|All'] );

Route::put('/category/status/{id}', ['uses'=>'Admin\CategoryController@status','as'=>'category-status', 'middleware'=> 'permission:Category Store|All'] );

Route::get('/category/edit/{id}', ['uses'=>'Admin\CategoryController@edit','as'=>'category-edit', 'middleware'=> 'permission:Category edit|All'] );

Route::put('/category/update/{id}', ['uses'=>'Admin\CategoryController@update','as'=>'category-update', 'middleware'=> 'permission:Category update|All'] );

Route::delete('/category/delete/{id}', ['uses'=>'Admin\CategoryController@destroy','as'=>'category-delete', 'middleware'=> 'permission:Category delete|All'] );



Route::get('/posts', ['uses'=>'Admin\PostController@index','as'=>'post-list', 'middleware'=> 'permission:Post List|All'] );

Route::get('/posts/create', ['uses'=>'Admin\PostController@create','as'=>'post-create', 'middleware'=> 'permission:Post List|All'] );

Route::post('/post/store', ['uses'=>'Admin\PostController@store','as'=>'post-store', 'middleware'=> 'permission:Post List|All'] );

Route::put('/post/status/{id}', ['uses'=>'Admin\PostController@status','as'=>'post-status', 'middleware'=> 'permission:Post List|All'] );

Route::put('/post/hot/news/{id}', ['uses'=>'Admin\PostController@hot_news','as'=>'hot_news-status', 'middleware'=> 'permission:Post List|All'] );

Route::get('/post/edit/{id}', ['uses'=>'Admin\PostController@edit','as'=>'post-edit', 'middleware'=> 'permission:Post List|All'] );

Route::put('/post/update/{id}', ['uses'=>'Admin\PostController@update','as'=>'post-update', 'middleware'=> 'permission:Post update|All'] );

Route::delete('/post/delete/{id}', ['uses'=>'Admin\PostController@destroy','as'=>'post-delete', 'middleware'=> 'permission:Post delete|All'] );


Route::get('/comment/{id}', ['uses'=>'Admin\CommentController@index','as'=>'comment-list', 'middleware'=> 'permission:Post List|All'] );

Route::get('/comment/reply/{id}', ['uses'=>'Admin\CommentController@reply','as'=>'comment-view', 'middleware'=> 'permission:Post List|All'] );

Route::post('/comment/reply', ['uses'=>'Admin\CommentController@store','as'=>'comment-reply', 'middleware'=> 'permission:Post List|All'] );

Route::put('/comment/status/{id}', ['uses'=>'Admin\CommentController@status','as'=>'comment-status', 'middleware'=> 'permission:Post List|All'] );

Route::get('/settings', ['uses'=>'Admin\SettingController@index','as'=>'setting', 'middleware'=> 'permission:Post List|All'] );

Route::put('/settings/update', ['uses'=>'Admin\SettingController@update','as'=>'setting-update', 'middleware'=> 'permission:Post List|All'] );

});

Route::get('/query', 'DbController@index');
Route::get('/joining', 'DbController@joining');
Route::get('/model', 'DbController@model');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
