<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ url('css/main.css') }}>
    <title>MyPhotos</title>
</head>
<body class="red">
    @if (count($photos) == 0)
        <h1>You have 0 photos</h1>
    @else
        <table class="w-100">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                    <tr class="red">
                        <td>{{$photo->id}}</td>
                        <td>{{$photo->title}}</td>
                        <td>{{$photo->url}}</td>
                        <td><img src={{$photo->url}} alt="Photo {{$photo->id}}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>