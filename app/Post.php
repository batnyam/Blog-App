<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class post extends Model {

	protected $table= 'post';

	protected $fillable = ['status', 'category', 'title', 'content', 'author', 'tag', 'metakey', 'excerpt'];

	protected $hidden = ['id', 'created_at', 'updated_at'];

}
