<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

	protected $table= 'category';

	public $timestamps = false;
	
	protected $fillable = ['name', 'description', 'menu'];

	protected $hidden = ['id', 'created_at', 'update_at'];

	public function post(){
		return $this->hasMany('Post');
	}
	

}
