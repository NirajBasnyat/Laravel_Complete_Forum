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
        $id = Auth::id();  //like of current user
        
        $likers = array(); //store all the likes in a reply

        foreach ($this->likes as $like)
        {
            array_push($likers, $like->user_id);  //sending likes into likers array
        }
        
        if (in_array($id, $likers)) //check if you've liked reply or not
        {
            return true;
        } 
        else
        {
             return false;
        }
    }
}
