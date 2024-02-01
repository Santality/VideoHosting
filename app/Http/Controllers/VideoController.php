<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function createPage(){
        $data = Category::all();
        return view('create_video', ['data' => $data]);
    }

    public function create(Request $request){
        $file = $request->file('file');
        $cover = $request->file('cover');
        $name1 = $file->hashName();
        $patch1 = $file->store('public/video');
        $name2 = $cover->hashName();
        $patch2 = $cover->store('public/cover');
        Video::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'file_name' => $name1,
            'cover' => $name2,
            'category' => $request['category'],
            'limit' => 1,
        ]);
        return redirect('/profile');
    }
}
