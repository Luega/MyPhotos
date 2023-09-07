@extends('layouts.app')

@section('content')

    <div class="form-group mb-4">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $photo->title }}" readonly>
    </div> 

    <div class="form-group text-center">
      <label for="title">Photo</label>
      <br>
      <div class="container_img_show">
        <img class="photo-preview" src="{{Storage::url('imgs/'.$photo->img)}}" alt="" srcset="" style="width:100%;height:100%;object-fit:contain;">
      </div>
    </div>      

@endsection