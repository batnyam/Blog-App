<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class comment extends Model {

	protected $table= 'comment';
	
	protected $fillable = ['post_id', 'author_name', 'author_ip', 'author_email', 'comment'];

	protected $hidden = ['id', 'post_id', 'author_ip', 'created_at', 'updated_at'];

}
