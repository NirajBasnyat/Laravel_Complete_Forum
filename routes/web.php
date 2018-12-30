<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// home route
Route::get('/forum', [
	'uses' => 'ForumsController@index',
	'as' => 'forum'
]);

// To get into channels using a channel name [slug=>channel]
Route::get('/channels/{slug}',[
	'uses' => 'ForumsController@channels',
	'as' => 'channels'
]);

//View a particular discussion
Route::get('discussion/{slug}',[
	'uses' => 'DiscussionsController@show',
	'as' => 'discussion.show'
]);


//routes to register app
Route::get('{provider}/auth',[
	'uses' => 'SocialsController@auth',
	'as' => 'social.auth'
]);

Route::get('/{provider}/redirect',[
	'uses' => 'SocialsController@auth_callback',
	'as' => 'social.callback'
]);


// routes for channel using middleware
Route::group(['middleware' => 'auth'],function(){

	Route::resource('channel','ChannelsController');

	//ROUTES FOR DISCUSSIONS
	Route::get('/discussion',[
		'uses' => 'DiscussionsController@index',
		'as' => 'discussion'
	]);

	Route::get('discussion/create/new',[
		'uses' => 'DiscussionsController@create',
		'as' => 'discussion.create'
	]);

	Route::post('discussion/store',[
		'uses' => 'DiscussionsController@store',
		'as' => 'discussion.store'
	]);

	Route::get('discussion/edit/{slug}',[
		'uses' => 'DiscussionsController@edit',
		'as' => 'discussion.edit'
	]);

	Route::post('discussion/update/{id}',[
		'uses' => 'DiscussionsController@update',
		'as' => 'discussion.update'
	]);

	// id = discussion_id
	Route::post('reply/{id}',[
		'uses' => 'RepliesController@reply',
		'as' => 'discussion.reply'
	]);

	//id  = reply_id
	Route::get('reply/like/{id}',[
		'uses' => 'RepliesController@like',
		'as' => 'reply.like'
	]);

	Route::get('reply/unlike/{id}',[
		'uses' => 'RepliesController@unlike',
		'as' => 'reply.unlike'
	]);

	//id = reply_id
	Route::get('best_answer/{id}',[
		'uses' => 'RepliesController@best_answer',
		'as' => 'best.answer'
	]);

	Route::get('reply/edit/{id}',[
		'uses' => 'RepliesController@edit',
		'as' => 'reply.edit'
	]);

	Route::post('reply/update/{id}',[
		'uses' => 'RepliesController@update',
		'as' => 'reply.update'
	]);
  	
  	// id = discussion_id
	Route::get('watch/{id}',[
		'uses' => 'WatchersController@watch',
		'as' => 'watch'
	]);

	Route::get('unwatch/{id}',[
		'uses' => 'WatchersController@unwatch',
		'as' => 'unwatch'
	]);

});

