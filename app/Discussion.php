<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable = ['title','content','user_id','channel_id','slug'];

    public function channel()
    {
    	return $this->belongsTo('App\Channel');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function replies()
    {
    	return $this->hasMany('App\Reply');
    }

    public function watchers()
    {
        return $this->hasMany('App\Watcher');
    }


    public function is_being_watched()
    {
        $id = Auth::id();

        $all_watchers = array();

        foreach ($this->watchers as $watcher) 
        {
           array_push($all_watchers, $watcher->user_id);
        }

        if (in_array($id, $all_watchers))
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    public function has_best_answer()
    {
        $result = false;

       foreach($this->replies as $reply)
       {
            if ($reply->best_answer)
            {
               $result = true;
               break;
            }
       }
       return $result;
    }

}
