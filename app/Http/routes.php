<?php

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

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/**
 * 顯示所有任務
 */
Route::get('/task', function () {
    if (Auth::check()) {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    } else {
        return redirect('/');
    }

});

/**
 * 增加新的任務
 */
Route::post('/task/create', function (TaskRequest $request) {
//    $validator = Validator::make($request->all(), [
//        'name' => 'required|max:255',
//    ]);
//
//    if ($validator->fails()) {
//        return redirect('/')
//            ->withInput()
//            ->withErrors($validator);
//    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/task');
});

/**
 * 刪除一個已有的任務
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/task');
});





/**
 * ***************************************************************
 * TEST 相關任務
 * ***************************************************************
 */
Route::get('/index', 'TestController@index');
Route::get('/create', 'TestController@create');
Route::post('/store', 'TestController@store');
Route::get('/show/{id}', 'TestController@show');
Route::get('/destroy/{id}', 'TestController@destroy');
Route::get('/edit/{id}', 'TestController@edit');
Route::post('/update/{id}', 'TestController@update');
