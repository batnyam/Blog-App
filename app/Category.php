<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

	protected $table= 'category';

	public $timestamps = false;
	
	protected $fillable = ['name', 'description', 'menu'];

	protected $hidden = ['id'];

}
