<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class config extends Model {

	protected $table= 'configuration';

	public $timestamps = false;

	protected $fillable = ['title', 'description', 'author', 'facebook', 'google', 'twitter', 'youtube', 'posts', 'metakey', 'theme'];

	protected $hidden = ['id'];

}