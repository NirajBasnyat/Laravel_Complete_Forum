<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use Auth;
use Session;

class DiscussionsController extends Controller
{
    public function index()
    {
    	return view('discussions.discussions');
    }

    public function create()
    {
    
    	return view('discussions.create');
    }

    public function store()
    {
    	
    	$request = request();
    	//dd($request);

    	$this->validate($request,[
    		'title' => 'required',
    		'channel_id' => 'required',
    		'content' => 'required'
    	]);

    	$discussion = Discussion::create([
    		'title' => $request->input('title'),
    		'channel_id' => $request->input('channel_id'),
    		'content' => $request->input('content'),
    		'user_id' => Auth::id(),
    		'slug' => str_slug($request->input('title'))
    	]);

    	Session::flash('success','Discussion created successfully');

    	return redirect()->route('discussion.show',['slug'=> $discussion->slug]);
    	
    }

    public function show($slug)
    {
    	$discussion = Discussion::where('slug',$slug)->first();

        $best_answer =$discussion->replies()->where('best_answer',1)->first();

    	return view('discussions.show')->with('discussion',$discussion)
                                       ->with('best_answer',$best_answer);
    }

    public function edit($slug)
    {
        $discussion = Discussion::where('slug',$slug)->first();

        return view('discussions.edit')->with('discussion',$discussion);
    }

    public function update($id)
    {
        $discussion = Discussion::find($id);

        $request = request();
        $this->validate($request,[
            'content' => 'required'
        ]);

        $discussion->content = $request->input('content');

        $discussion->save();

        Session::flash('success','Discussion updated');

        return redirect()->route('discussion.show',['slug' => $discussion->slug]);
    }

}
