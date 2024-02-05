<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::where('limit', 1)->orderBy('created_at', 'DESC')->paginate(2);
        return view('index', ['videos' => $videos]);
    }

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
            'user' => Auth::user()->id,
            'limit' => 1,
        ]);
        return redirect('/profile');
    }

    public function video($id){
        $video = Video::find($id);
        $comment = Comment::with('user_com')->where('video', $id)->orderBy('created_at', 'DESC')->paginate(3);
        $likes = Like::where('id_video', $id)->count();
        $dislikes = Dislike::where('id_video', $id)->count();
        return view('video', ['video' => $video, 'comment' => $comment, 'likes' => $likes, 'dislikes' => $dislikes]);
    }

    public function comment(Request $request){
        Comment::create([
            'user' => Auth::user()->id,
            'text' => $request['text'],
            'video' => $request['id'],
        ]);
        return redirect()->back();
    }

    public function like($id){
        if(Dislike::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->exists()){
            Dislike::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->delete();
            if(Like::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->exists()){
                return redirect()->back();
            }else{
                Like::create([
                    'id_user' => Auth::user()->id,
                    'id_video' => $id,
                ]);
                return redirect()->back();
            }
        }else{
            if(Like::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->exists()){
                return redirect()->back();
            }else{
                Like::create([
                    'id_user' => Auth::user()->id,
                    'id_video' => $id,
                ]);
                return redirect()->back();
            }
        }
    }

    public function dislike($id){
        if(Like::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->exists()){
            Like::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->delete();
            if(Dislike::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->exists()){
                return redirect()->back();
            }else{
                Dislike::create([
                    'id_user' => Auth::user()->id,
                    'id_video' => $id,
                ]);
                return redirect()->back();
            }
        }else{
            if(Dislike::where([['id_user', '=', Auth::user()->id],['id_video', '=', $id]])->exists()){
                return redirect()->back();
            }else{
                Dislike::create([
                    'id_user' => Auth::user()->id,
                    'id_video' => $id,
                ]);
                return redirect()->back();
            }
        }
    }
}
