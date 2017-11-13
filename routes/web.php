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

// Route::group(['middleware'=>'web'],function(){
// 	Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
// 	Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);
// 	Route::auth();
// });
// Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
// 	//admin
// 	Route::get('/',function(){

// 	});

// 	//pages
// 	Route::group(['prefix'=>'pages'],function(){
// 		//admin/pages
// 		Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);
// 		//admin/pages/add
// 		Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
// 		//admin/edit/2
// 		Route::match(['get','post','delete'],'edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
// 	});
// 	//portfolios
// 	Route::group(['prefix'=>'portfolio'],function(){
		
// 		Route::get('/',['uses'=>'PortfolioController@execute','as'=>'portfolio']);
		
// 		Route::match(['get','post'],'/add',['uses'=>'PortfolioAddController@execute','as'=>'portfolioAdd']);
		
// 		Route::match(['get','post','delete'],'edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);
// 	});
// 	//services
// 	Route::group(['prefix'=>'services'],function(){
		
// 		Route::get('/',['uses'=>'ServiceController@execute','as'=>'services']);
		
// 		Route::match(['get','post'],'/add',['uses'=>'ServiceAddController@execute','as'=>'serviceAdd']);
		
// 		Route::match(['get','post','delete'],'edit/{service}',['uses'=>'ServiceEditController@execute','as'=>'serviceEdit']);
// 	});
// });
// <?php

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


Route::group([], function () {
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);
    Route::post('/', ['uses' => 'IndexController@sendMail', 'as' => 'mail']);
    Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);
    Route::auth();
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        if (view()->exists('admin.index')) {
            $data = ['title' => 'Панель адміністратора'];
            return view('admin.index', $data);
        }

    });


    Route::group(['prefix' => 'pages'], function () {

        Route::get('/', ['uses' => 'admin\PagesController@index', 'as' => 'pages']);
        Route::get('/add', ['uses' => 'admin\PagesController@create', 'as' => 'pagesAdd']);
        Route::post('/add', ['uses' => 'admin\PagesController@store', 'as' => 'pagesStore']);
        Route::delete('/edit/{page}', ['uses' => 'admin\PagesController@destroy', 'as' => 'pagesDestroy']);
        Route::get('/edit/{page}', ['uses' => 'admin\PagesController@edit', 'as' => 'pagesEdit']);
        Route::patch('/edit/{page}', ['uses' => 'admin\PagesController@update', 'as' => 'pagesUpdate']);
     
    });


    Route::resource('/portfolios', 'admin\PortfolioController', ['except' => [
        'show'
    ]]);


    Route::group(['prefix' => 'services'], function () {
        Route::get('/', ['uses' => 'admin\ServiceController@index', 'as' => 'services']);
        Route::get('/add', ['uses' => 'admin\ServiceController@create', 'as' => 'servicesAdd']);
        Route::post('/add', ['uses' => 'admin\ServiceController@store', 'as' => 'servicesStore']);
        Route::get('/edit/{service}', ['uses' => 'admin\ServiceController@edit', 'as' => 'servicesEdit']);
        Route::patch('/edit/{service}', ['uses' => 'admin\ServiceController@update', 'as' => 'servicesUpdate']);
        Route::delete('/edit/{service}', ['uses' => 'admin\ServiceController@delete', 'as' => 'servicesDelete']);


    });


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
