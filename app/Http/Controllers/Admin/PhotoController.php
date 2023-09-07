<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::where('user_id', $request->user()->id)->get();

        $data = [
            "photos" => $photos
        ];

        return view('photos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100',
            'img'=>'required|mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);

        $photo = new Photo();

        $photo->title = $request->input('title');
        
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->storeAs('public/imgs', $filename);

        $photo->img = $filename;

        $photo->user_id = $request->user()->id;

        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {

        $data = [
            "photo" => $photo
        ];

        return view('photos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $data = [
            'photo' => $photo
        ];

        return view('photos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title'=>'required|max:100',
        ]);

        
        if($request->hasFile('img')) {

            $request->validate([
            'img'=>'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->storeAs('public/imgs', $filename);
            
            Storage::disk('public')->delete('imgs/' . $photo->img);

            $photo->img = $filename;
        }

        $photo->title = $request->input('title');

        $photo->user_id = $request->user()->id;
        
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {

        Storage::disk('public')->delete('imgs/' . $photo->img);

        $photo->delete();



        return redirect()->route('photos.index')->with('success', 'Photo removed successfully');
    }
}
