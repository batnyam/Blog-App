@extends('admin.sidebar')
<div class="col-md-10 col-md-offset-2 content" id="media">
    @foreach($images as $img)
      <img src="{{ $img }}" width="200px" height="200px" alt="Media" />
    @endforeach
</div>
