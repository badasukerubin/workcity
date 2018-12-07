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

/**
 * WorkCity panels
 * This includes:
 * Home
 * About Us
 * Contact Us
 * Privacy Policy
 **/
Route::get('/', 'HomePageController@index');
Route::get('about', 'AboutPageController@index');
Route::get('privacy', 'PrivacyPageController@index');


/**
 * WorkCity all users access
 * This includes the
 * Users registration
 * Verification
 * Login
 * Logout
 * LoggedIn
 **/
Auth::routes();
//Activation
Route::get('activation', 'Auth\RegisterController@activation')->name('activation');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailConfirmed')->name('sendEmailConfirmed');
//LoggedIn
Route::get('/user/index', 'HomeController@index')->name('index');
//Logout
Route::get('/logout', 'Auth\LoginController@logout');


/**
 * WorkCity users access
 * This includes:
 * Logs
 * UpdateProfile
 * Sponsors and investors
**/
//Logs
Route::get('user/logs', 'LoginActivityController@index');
//UpdateProfile
Route::get('user/edit_profile', 'UpdateProfileController@create')->name('UpdateProfile.create');
Route::post('user/edit_profile', ['as'=>'UpdateProfile.store', 'uses'=>'UpdateProfileController@store']);
//Sponsors and investors
Route::get('user/be_sponsors_investors', 'BeSponsorsInvestorsController@index');
Route::get('user/sponsors_investors', 'SponsorsInvestorsController@index')->name('SponsorsInvestors.create');
Route::post('user/sponsors_investors', ['as'=>'SponsorsInvestors.store', 'uses'=>'SponsorsInvestorsController@store']);
Route::get('/user/sponsors_investors_up', 'SponsorsInvestorsUpController@index');
Route::get('/user/sponsors_investors_up/more/{id}/{user_id}', 'SponsorsInvestorsMoreController@index');


/**
 * WorkCity all coordinators access
 * This includes the
 * Coordinator registration
 * Login
 * Logout
 * LoggedIn
 **/
//Coordinator Panel
Route::get('coordinator/login', 'Coord\LoginController@showLoginForm');
Route::post('coordinator/login', 'Coord\LoginController@login');
Route::get('coordinator/logout', 'Coord\LoginController@logout');
Route::get('coordinator/welcome', 'Coord\HomeController@index');


/**
 * WorkCity coordinators access
 * This includes:
 * Logs
 * UpdateProfile
 * Generate Links
 * Sponsors and investors
 **/
//Logs
Route::get('coordinator/logs', 'Coord\LoginActivityController@index');
//UpdateProfile
Route::get('coordinator/edit_profile', 'Coord\UpdateProfileController@create')->name('CUpdateProfile.create');
Route::post('coordinator/edit_profile', ['as'=>'CUpdateProfile.store', 'uses'=>'Coord\UpdateProfileController@store']);
//Generate Links
Route::get('coordinator/gen_link', 'Coord\GenLinkController@index');
//Sponsors and investors
Route::get('coordinator/be_sponsors_investors', 'Coord\BeSponsorsInvestorsController@index');
Route::get('coordinator/sponsors_investors', 'Coord\SponsorsInvestorsController@index')->name('CSponsorsInvestors.create');
Route::post('coordinator/sponsors_investors', ['as'=>'CSponsorsInvestors.store', 'uses'=>'Coord\SponsorsInvestorsController@store']);
Route::get('/coordinator/sponsors_investors_up', 'Coord\SponsorsInvestorsUpController@index');
Route::get('/coordinator/sponsors_investors_up/more/{id}/{coordinator_id}','Coord\SponsorsInvestorsMoreController@index');


/**
 * WorkCity all admins access
 * This includes the
 * Admin inclusion
 * Login
 * Logout
 * LoggedIn
 **/
//Administrator and Panel
Route::get('admin/login', 'Admin\LoginController@showLoginForm');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::get('admin/welcome', 'Admin\HomeController@index');


/**
 * WorkCity admin access
 * This includes:
 * Atmosphere Search
 * Page Logs
 * Logs
 * Admin List
 * Registered User List
 * Updated User List
 * Bank List
 * Schools List
 * Business Type List
 * Business Descriptions List
 * Coordinators
 **/
//Atmosphere Search
Route::get('admin/queries', 'Admin\QueryController@search')->name('queries.search');
//Page Logs

//Logs
Route::get('admin/logs', 'Admin\UserActivityController@index');
//Admin List
Route::get('admin/admin_list', 'Admin\AlistController@index')->name('admin.admin');
Route::get('admin/admin_list/add', 'Admin\AddAdminsController@index')->name('add.admins');
Route::post('admin/admin_list/add', ['as'=>'admins.add', 'uses'=>'Admin\AddAdminsController@add']);
Route::get('admin/admin_list/destroy/{id}/{admins}', 'Admin\AlistController@destroy')->name('admins.destroy');
//Registered User List
Route::get('admin/user', 'Admin\AuserController@index')->name('admin.user');
Route::get('admin/user/destroy/{id}/{fullname}', 'Admin\AuserController@destroy')->name('ruser.destroy');
//Updated user List
Route::get('admin/up_user', 'Admin\ReguserController@index')->name('admin.uuser');
Route::get('admin/up_user/destroy/{id}/{username}', 'Admin\ReguserController@destroy')->name('uuser.destroy');
//Bank List
Route::get('admin/banks', 'Admin\BanksController@index')->name('admin.banks');
Route::get('admin/banks/add', 'Admin\AddBanksController@index')->name('add.banks');
Route::post('admin/banks/add', ['as'=>'banks.add', 'uses'=>'Admin\AddBanksController@add']);
Route::get('admin/banks/edit/{id}/{banks}', 'Admin\BanksController@edit')->name('banks.edit');
Route::get('admin/banks/destroy/{id}/{banks}', 'Admin\BanksController@destroy')->name('banks.destroy');
//Schools List
Route::get('admin/schools', 'Admin\SchoolsController@index')->name('admin.schools');
Route::get('admin/schools/add', 'Admin\AddSchoolsController@index')->name('add.schools');
Route::post('admin/schools/add', ['as'=>'schools.add', 'uses'=>'Admin\AddSchoolsController@add']);
Route::get('admin/schools/edit/{id}/{schools}', 'Admin\SchoolsController@edit')->name('schools.edit');
Route::get('admin/schools/destroy/{id}/{schools}', 'Admin\SchoolsController@destroy')->name('schools.destroy');
//Business Type List
Route::get('admin/business', 'Admin\BusinessController@index');
//Business Description List
Route::get('admin/business_desc', 'Admin\BusinessDescController@index')->name('admin.business');
Route::get('admin/business_desc/edit/{id}/{schools}', 'Admin\BusinessDescController@edit')->name('business.edit');
Route::get('admin/business_desc/destroy/{id}/{schools}', 'Admin\BusinessDescController@destroy')->name('business.destroy');
//Coordinator List
Route::get('admin/coordinators', 'Admin\CoordController@index')->name('admin.coord');
Route::get('admin/coordinators/add', 'Admin\AddCoordController@index')->name('add.coord');
Route::post('admin/coordinators/add', ['as'=>'banks.add', 'uses'=>'Admin\AddCoordController@add']);
Route::get('admin/coordinators/edit/{id}/{coord}', 'Admin\CoordController@edit')->name('coord.edit');
Route::get('admin/coordinators/destroy/{id}/{coord}', 'Admin\CoordController@destroy')->name('coord.destroy');

