<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/todos',function () {
//	return response()->json([
//		['id' => 1,'title' => 'Learn Vue js','completed' => false],
//		['id' => 2,'title' => 'Go to shop','completed' => false],
//	]);
//})->middleware('api');

Route::get('/todos',function () {
	$todos = App\Todo::all();
	return $todos;
})->middleware('api');

Route::post('/todo/create',function (Request $request) {
	$data = ['title' => $request->get('title'),'completed' => 0];
	$todo = App\Todo::create($data);
	return $todo;
})->middleware('api');

Route::patch('/todo/{id}/completed', function ($id) {
	$todo = App\Todo::find($id);
	$todo->completed = ! $todo->completed;
	$todo->save();
	return $todo;
})->middleware('api');

Route::delete('/todo/{id}/delete', function ($id) {
	$todo = App\Todo::find($id);
	$todo->delete();
	return response()->json(['deleted']);
})->middleware('api');

Route::get('/todo/{id}', function ($id) {
	$todo = App\Todo::find($id);
	return $todo;
})->middleware('api');

Route::get('/counter',function () {
	$counter = App\Counter::find(1);
	return $counter->value;
})->middleware('api');

Route::patch('/counter', function (Request $request) {
	$counter = App\Counter::find(1);
	$counter->value = $request->get('value');
	$counter->save();
	return $counter;
})->middleware('api');

Route::post('/gps/create',function (Request $request) {
	$data = ['records' => $request->get('records'),'completed' => 0];
	$records = App\Record::create($data);
	return $records;
})->middleware('api');