<?php

namespace App\Http\Controllers;

use App\Models\Limit;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $data = Video::with('category_vid', 'limit_vid')->paginate(2);
        $limits = Limit::all();
        return view('admin.index',['data' => $data,'limits' => $limits]);
    }

    public function limit(Request $request){
        $data = Video::find($request['id']);
        $data->limit = $request['limit'];
        $data->save();
        return redirect()->back();
    }
}
