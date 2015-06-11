<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

	protected $table= 'category';

	protected $fillable = ['name', 'description'];

	protected $hidden = ['id'];

}
