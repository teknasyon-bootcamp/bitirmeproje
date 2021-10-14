<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function detail(Request $request, $id)
    {
        if (Auth::id()){
            History::firstOrCreate([
                'post_id' => $id,
                'user_id' => Auth::id()
            ]);
        }
        $thePost = \App\Models\Post::with('comments')->find($id);
        return view('detail')->with([
            'thePost' => $thePost
        ]);
    }
}
