<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
	protected $table = "post";
    //

    protected $fillable = [
    	'user_id', 'title', 'body'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
