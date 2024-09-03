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

Route::get('/', function () {
    return view('login');
});

Route::get('/employee', function () {
    return view('employe_login');
});

Route::post('/login-post','AdminController@LoginAdmin');
Route::get('/dashboard','AdminController@Dashboard');
Route::get('/invite-employee/{id}','AdminController@SendMail');
Route::get('/Add-tasks/{id}','AdminController@AddTasks');
Route::post('/save-tasks','AdminController@SaveTasks');
Route::post('/update-task','AdminController@UpdateTasks');
Route::get('/edit-tasks/{id}','AdminController@EditTasks');
Route::get('/delete-tasks/{id}','AdminController@DeleteTasks');
Route::get('/logout','AdminController@Logout');
Route::get('/emp-logout','EmployeeController@Logout');

Route::post('/emp-login-post','EmployeeController@Login');
Route::get('/emp_tasks','EmployeeController@TasksPage');
Route::post('/change-status','EmployeeController@ChangeStatus');



