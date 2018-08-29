<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
Use Auth;
use App\Watcher;

class WatchersController extends Controller
{
    public function watch($id)
    {
    	Watcher::create([
    		'user_id' => Auth::id(),
    		'discussion_id' => $id
    	]);

    	Session::flash('success','Watching the Discussion');

    	return redirect()->back();
    }

    public function unwatch($id)
    {
    	$watch = Watcher::where('discussion_id',$id)->where('user_id',Auth::id());

    	$watch->delete();

    	Session::flash('success','Not watching the Discussion');

    	return redirect()->back();
    }
}
