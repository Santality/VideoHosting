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
        Video::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'file_name'
            'category' => $request['category'],
            'limit' => 1,
        ]);
        $name_cover = $request;
    }
}
