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

Auth::routes();

Route::name('site.')->group(function(){
    Route::get('/','SiteController@index')->name('index');
    Route::get('/contact','SiteController@contact')->name('contact');
    Route::post('/contact','SiteController@submitContact')->name('contact.send');
    Route::get('/articles/{article}','SiteController@showArticle')->name('articles.show');
    Route::get('/evenements/{event}/participer','SiteController@participerEvenement')->name('events.participer');
    Route::post('/evenements/{event}/participer','SiteController@processParticipation')->name('events.login');
    Route::post('/evenements/{event}/register','SiteController@processRegisterParticipation')->name('events.register');
    Route::middleware('auth')->group(function(){
        Route::get('/adhesion','SiteController@adhesion')->name('adhesion');
        Route::get('/adhesion/maj','SiteController@adhesionMaj')->name('adhesion.maj');
        Route::post('/adhesion/maj','SiteController@adhesionMajSubmit')->name('adhesion.maj.submit');


    });

});

Route::middleware('admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/','AdminController@index')->name('index');
    Route::get('/articles','AdminController@articles')->name('articles');
    Route::get('/articles/rediger','AdminController@articlesRediger')->name('articles.rediger');
    Route::post('/articles/rediger','AdminController@articlesStore')->name('articles.store');
});


Route::get('/email',function (){
    return view('emails.template',[
        'event' => \App\Event::find(1)
    ]);
});


Route::get('/home', 'HomeController@index')->name('home');
