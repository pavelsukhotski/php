<?php

/* ... */

use Illuminate\Http\Request;
use Illuminate\Routing;

Route::get('/', function() {
	$users = \App\User::orderBy('id', 'asc')->get();
	return view('welcome',[
		'users' => $users
	]);
});


Route::post('/user', function(Request $request){
	// $validator = Validator::make($request->all(), [
	// 	'name' => 'required|max:255'
	// ]);
	// if($validator->fails()) {
	// 	return redirect ('/')
	// 	->withInput()
	// 	->withErrors($validator);
	// }
	$user = new \App\User;
	$user->name = $request->name;
	$user->country = $request->country;
	$user->region = $request->region;
	$user->city = $request->city;
	$user->save();

	return redirect('/');
});

Route::delete('/user/{user}', function(\App\User $user) {
	$user->delete();
	return redirect('/');
});

// Route::update('/user/{id}', function(\App\User $user) {
// 	$user->update();
// 	return redirect('/user/{id}');
// });















// Route::get('/', function(){
// 	//$users = DB::table('users')->get();
// 	//$users = App\User::all();
// 	$users = App\User::foreign();
// 	return view('welcome', compact('users'));
// })->name('user');

