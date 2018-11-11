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

// Home
Route::get('/', 'IndexController@index')->name('index.home');
Route::get('/home1', 'IndexController@home1')->name('index.home1');
Route::get('/home2', 'IndexController@home2')->name('index.home2');
Route::get('/home3', 'IndexController@home3')->name('index.home3');
// About
Route::get('/about', 'AboutController@about')->name('index.about');
// Our Solutions
Route::get('/shared_hosting', 'SolutionsController@sharedHosting')->name('index.sharedHosting');
Route::get('/virtual_servers', 'SolutionsController@virtualServers')->name('index.virtualServers');
Route::get('/dedicated_servers', 'SolutionsController@dedicatedServers')->name('index.dedicatedServers');
// Portfolio
Route::get('/portfolio2', 'PortfolioController@portfolio2')->name('index.portfolio2');
Route::get('/portfolio3', 'PortfolioController@portfolio3')->name('index.portfolio3');
Route::get('/portfolio4', 'PortfolioController@portfolio4')->name('index.portfolio4');

// Features
Route::get('/page_full_width','FeaturesController@fullWidth')->name('index.fullWidth');
Route::get('/page_left_bar','FeaturesController@leftBar')->name('index.leftBar');
Route::get('/page_right_bar','FeaturesController@rightBar')->name('index.rightBar');
Route::get('/page_faq','FeaturesController@pageFaq')->name('index.pageFaq');
Route::get('/page_sitemap','FeaturesController@siteMap')->name('index.siteMap');


// Promotions
Route::get('/promotions', 'PromotionsController@promotions')->name('index.promotions');
// Blog
Route::get('/blog', 'BlogController@blog')->name('index.blog');
Route::get('/blog_single', 'BlogController@blogSingle')->name('index.blogSingle');
// Contact
Route::get('/contact', 'ContactController@contact')->name('index.contact');


// lara make:auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Админ часть (/admin)
//Route::group(['prefix' => 'admin', 'middleware' => ['web','auth']], function () {
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // /admin/home (? serv55 rabotalo /admin, tut 403 forbiden, na loc ??? poetomu /admin/home...)
    Route::get('/home', 'Admin\IndexController@index')->name('admin.index');
    // All this for Home page (main)
    Route::resource('/msliders', 'Admin\MainSliderController');
    Route::resource('/prices', 'Admin\PriceController');
    Route::resource('/features', 'Admin\FeaturesController');


    // Home1 page slider (second slider)
    Route::resource('/ssliders', 'Admin\SecondSliderController');
    // Home1 gray stripe(& blue stripe) with text
    Route::resource('/grays', 'Admin\GrayController');
    // Home2 content article
    Route::resource('/homes', 'Admin\HomesController');


    // /admin/abouts
    Route::resource('/abouts', 'Admin\AboutController');
    // /admin/accords (содержимое табл с текстом аккордиона :)
    Route::resource('/accordions', 'Admin\AccordionController');
    // /admin/teams
    Route::resource('/teams', 'Admin\TeamController');

    // Our Solutions (/shareds, /svps, /sdedics)
    Route::resource('/shareds', 'Admin\SharedsController');
    Route::resource('/svps', 'Admin\SvpsController');
    Route::resource('/sdedics', 'Admin\SdedicsController');

    // /admin/portfolios
    Route::resource('/portfolios', 'Admin\PortfolioController');

    //admin /promotions
    Route::resource('/promotions', 'Admin\PromotionController');

    //admin /contacts
    Route::resource('/contacts', 'Admin\ContactController');

    // seo pages /seops
    Route::resource('/seops', 'Admin\SeopsController');

    Route::resource('/users', 'Admin\UserController');
});
