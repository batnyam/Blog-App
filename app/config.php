<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class config extends Model {

	protected $table= 'configuration';

	public $timestamps = false;

	protected $fillable = ['title', 'description', 'author'];

	protected $hidden = ['facebook', 'google', 'twitter', 'youTube'];

}
