@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 

    @if(count($photos) == 0)

        <h1 class="text-center">You have 0 photos</h1>

    @else

        <table class="table table-striped">
                
            <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Preview</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($photos as $photo)

                    <tr class="text-center align-middle">
                        <td>{{$photo->id}}</td>
                        <td>{{$photo->title}}</td>
                        <td><img class="photo-preview" src="{{asset('img/'.$photo->img)}}" alt="" srcset="" style="width:100px;height:100px;object-fit:contain;"></td>
                        <td>
                            <a class="btn btn-info" href="{{ route('photos.show', ['photo' => $photo->id]) }}">DETAILS</a>
                        </td>   
                        <td>
                            <a class="btn btn-success" href="{{ route('photos.edit', ['photo' => $photo->id]) }}">EDIT</a>
                        </td>
                        <td>
                            <form method='POST' action="{{ route('photos.destroy', ['photo' => $photo->id]) }}">
                                @csrf
                                @method('DELETE')
                                
                                <input class="btn btn-danger" type="submit" value="DELETE">
                            </form>
                        </td>                                                                       
                    </tr>            

                @endforeach

            </tbody>

        </table>    

    @endif

@endsection