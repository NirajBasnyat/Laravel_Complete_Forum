<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Auth;
use App\Discussion;
use App\Channel;

class ForumsController extends Controller
{
    public function index()
    {
    	//$discussions = Discussion::orderBy('created_at','Desc')->paginate(3);
        switch (request('filter'))
         {
            case 'me':
                $results = Discussion::where('user_id',Auth::id())->paginate(3);
                break;

            case 'solved':

                $solved = array();

                foreach (Discussion::all() as $discussion) 
                {
                   if ($discussion->has_best_answer()) 
                   {
                      array_push($solved, $discussion);
                   }
                }

                $results = new Paginator($solved,10);
                break;

            case 'unsolved':
                $unsolved = array();

                foreach (Discussion::all() as $discussion)
                {
                    if (!$discussion->has_best_answer()) 
                    {
                       array_push($unsolved, $discussion);
                    }
                }

                $results = new Paginator($unsolved,10);
                break;
        
            default:
                $results = Discussion::orderBy('created_at','Desc')->paginate(3);
                break;
        }
    	return view('forum')->with('discussions',$results);
    }

    public function channels($slug)
    {
    	$channels = Channel::where('slug',$slug)->first();

    	//dd($channels->discussions);
   
    	return view('channels')->with('discussions',$channels->discussions);
    }
}
