@extends('layouts.app')

@section('content')

    <div class="form-group mb-4">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $photo->title }}" readonly>
    </div> 

    <div class="form-group text-center">
      <label for="title">Photo</label>
      <br>
      <img class="photo-preview" src="{{Storage::url('imgs/'.$photo->img)}}" alt="" srcset="" style="width:600px;height:600px;object-fit:contain;">
    </div>      

@endsection