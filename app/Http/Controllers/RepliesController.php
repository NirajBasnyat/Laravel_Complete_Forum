<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Like;
use App\User;
use App\Reply;
use Notification;
use App\Discussion;
use Illuminate\Http\Request;

class RepliesController extends Controller
{


	public function reply($id)
	{
		//dd($id);
		$discussion = Discussion::find($id);

		$reply = Reply::create([

			'user_id' => Auth::id(),
			'content' => request()->input('content'),
			'discussion_id' => $id
		]);

		//to increase the points upon a reply

		$reply->user->points += 25;
		$reply->user->save();

		//For the Notification

		$all_watchers = array(); //gets all the user_id of watchers in a discussion

		foreach ($discussion->watchers as $watcher) 
		{
			array_push($all_watchers, User::find($watcher->user_id));
		}

		Notification::send($all_watchers, new \App\Notifications\NewReplyAdded($discussion)); //sending notification to all the watchers(all_watchers) 


		Session::flash('success','Comment Posted');
		return redirect()->route('discussion.show',['slug'=>$discussion->slug]);
	}

	public function like($id)
	{
		Like::create([
			'reply_id' => $id,
			'user_id' => Auth::id()
		]);

		Session::flash('success','Comment Liked');
		return redirect()->back();
	}

	public function unlike($id)
	{
		$like = Like::where('reply_id',$id)->where('user_id',Auth::id());

		$like->delete();

		Session::flash('success','Comment Unliked');
		return redirect()->back();
	}

	public function best_answer($id)
	{
		$reply = Reply::find($id);

		$reply->best_answer = 1;

		$reply->save();

		$reply->user->points +=100;
		$reply->user->save();

		Session::flash('success','Comment marked as the best answer');

		return redirect()->back();

	}

	public function edit($id)
	{
		$reply = Reply::find($id);

		return view('replies.edit')->with('reply',$reply);
	}

	public function update($id)
	{
		$reply = Reply::find($id);

		$this->validate(request(),[
			'content' => 'required'
		]);

		$reply->content = request()->input('content');
		$reply->save();

		Session::flash('success','Reply edited');

		return redirect()->route('discussion.show',['slug' => $reply->discussion->slug]);
	}
}
