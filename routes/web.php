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

Route::get('/', 'HomeController@home');

Route::resource('uom', 'UomController')->middleware(['admin', 'director']);

Route::resource('sample', 'SampleController')->middleware(['admin', 'director']);
// Route::resource('isstandard', 'ISStandardController')->middleware(['admin', 'director']);
Route::resource('testmethod', 'TestMethodController')->middleware(['admin', 'director']);
Route::resource('testitem', 'TestItemController')->middleware(['admin', 'director']);
Route::resource('customer', 'CustomerController')->middleware('auth');

// Route::resource('test', 'TestController')->middleware('auth');
// Route::get('/drafts', 'TestController@drafts')->middleware('auth')->name('test.drafts');
// Route::get('/registerd/tests', 'TestController@registeredTests')->middleware('auth')->name('registered.tests');

// Route::get('/test/register/{id}', 'TestController@register')->middleware('auth')->name('test.regsiter');
// Route::resource('user', 'UserController')->middleware(['admin', 'director']);

Route::resource('lab', 'LabController');
Route::post('lab/{id}/user/allocate/', 'LabUserController@allocateUser')->name('allocate.user');
// Route::post('lab/{id}/user/remove/', 'LabUserController@removeUser')->name('remove.user');
Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('auth');

// Route::get('/test/allocate/{id}', 'TestController@allocateView')->name('allocate.get');
// Route::post('/test/allocate', 'TestController@allocateAction')->name('allocate');

// Route::get('/jobs/user', 'TestController@myJobs')->name('user.jobs')->middleware('auth');

// Route::get('/user/{id}/technician', 'UserController@makeTechnician')->name('user.technician')->middleware(['admin', 'director']);
// Route::get('/user/{id}/employee', 'UserController@makeEmployee')->name('user.employee')->middleware(['admin', 'director']);

// Route::get('/report/{id}', 'TestController@report')->name('test.report');
