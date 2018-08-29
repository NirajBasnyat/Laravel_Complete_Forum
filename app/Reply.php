<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Reply extends Model
{
    protected $fillable = ['user_id','content','discussion_id','best_answer'];

    public function discussion()
    {
    	return $this->belongsTo('App\Discussion');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user()
    {
        //like of current user
        $id = Auth::id();

        //store all the likes in a reply
        $likers = array();

        foreach ($this->likes as $like)
        {
            //sending likes into likers array
            array_push($likers, $like->user_id); 
        }

        //check if you've liked reply or not
        if (in_array($id, $likers))
        {
            return true;
        } 
        else
        {
             return false;
        }
        


    }
}
