<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{


    public function index(Request $request)
    {
        $comments = Comment::with('post', 'user')
            ->orderBy('id', 'desc')
            ->paginate(10);


        return view('comments.index')->with([
            'comments' => $comments
        ]);
    }

    public function store(Request $request)
    {
        Comment::create([
            'post_id' => $request->get('post_id'),
            'is_hidden' => $request->exists('is_hidden') && $request->get('is_hidden') === 'on',
            'user_id' => Auth::user() ? Auth::id() : null,
            'content' => $request->get('content')
        ]);

        return Redirect::back();
    }

    public function activate(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'is_active' => !$comment->is_active
        ]);

        return Redirect::back();
    }

    public function edit(Request $request, $id)
    {
        $theComment = Comment::find($id);

        return view('comments.edit')->with([
            'theComment' => $theComment
        ]);
    }

    public function update(Request $request, $id)
    {
        $theComment = Comment::find($id);

        $theComment->update([
            'is_active' => $request->exists('is_active') && $request->get('is_active') === 'on',
            'content' => $request->get('content')
        ]);

        $this->setFlash('success', 'Yorum guncellendi');

        return Redirect::back();
    }

    private function setFlash($type, $message)
    {
        Session::flash('message', $message);
        Session::flash('type', $type);
    }
}
