<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Route::get('step-1/{id}', 'EmployeeController@stepOne')->name('step-1');
Route::get('step-2/{id}', 'EmployeeController@stepTwo')->name('step-2');
Route::get('step-3/{id}', 'EmployeeController@stepThree')->name('step-3');
Route::get('step-4/{id}', 'EmployeeController@stepFour')->name('step-4');
Route::get('step-5/{id}', 'EmployeeController@stepFive')->name('step-5');

//edit
Route::get('step-1/edit/{id}', 'EmployeeController@editStepOne')->name('step-1.edit');
Route::get('step-2/edit/{id}', 'EmployeeController@editStepTwo')->name('step-2.edit');
Route::get('step-3/edit/{id}', 'EmployeeController@editStepThree')->name('step-3.edit');
Route::get('step-4/edit/{id}', 'EmployeeController@editStepFour')->name('step-4.edit');
Route::get('step-5/edit/{id}', 'EmployeeController@editStepFive')->name('step-5.edit');
//edit

Route::get('thanks', 'EmployeeController@thanks')->name('thanks');

//Admin login
Route::get('admin/login', 'Admin\AdminController@login')->name('admin.login');
Route::post('authenticate', 'Admin\AdminController@authenticate')->name('authenticate');
Route::get('/admin/profile/edit', 'Admin\AdminController@editProfile')->name('admin.profile.edit');
Route::post('/admin/profile/update', 'Admin\AdminController@updateProfile')->name('admin.profile.update');
Route::post('admin/logout', 'Admin\AdminController@logOut')->name('admin.logout');

//admin reset password
Route::get('admin/forgot_password', 'Admin\AdminController@forgotPassword')->name('admin.forgot_password');
Route::get('admin/send-password-reset-link', 'Admin\AdminController@passwordResetLink')->name('admin.send-password-reset-link');
Route::get('admin/reset-password/{token}', 'Admin\AdminController@resetPassword')->name('admin.reset-password');
Route::post('admin/change_password', 'Admin\AdminController@changePassword')->name('admin.change_password');

//share link
Route::get('admin/share_link', 'Admin\AdminController@shareLink')->name('admin.share_link');

//Home
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//Roles
Route::resource('role', 'Admin\RoleController');

//users
Route::resource('user', 'Admin\UserController');

//permissions
Route::resource('permission', 'Admin\PermissionController');

//mail settings
Route::resource('mail_setting', 'Admin\MailSettingController');

//Employee
Route::resource('employee', 'EmployeeController');
