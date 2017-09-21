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

/**
 * 顯示所有任務
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * 增加新的任務
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * 刪除一個已有的任務
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});


Route::get('/index', 'TestController@index');
Route::get('/create', 'TestController@create');
Route::post('/store', 'TestController@store');
Route::get('/show/{id}', 'TestController@show');
Route::get('/destroy/{id}', 'TestController@destroy');
Route::get('/edit/{id}', 'TestController@edit');
Route::post('/update/{id}', 'TestController@update');