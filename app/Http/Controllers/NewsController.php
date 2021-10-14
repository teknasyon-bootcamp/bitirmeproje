<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\UserCategory;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    use FileTrait;

    public function index(Request $request)
    {
        $posts = Post::orderBy('id')
            ->with('category', 'writer')
            ->paginate(10);


        return view('posts.index')->with([
            'items' => $posts
        ]);
    }

    public function create(Request $request)
    {
        if (Auth::user()->type_id === 1){
            $categories = Category::get();
        }else {

            $userCategories = UserCategory::where('user_id', Auth::id())->pluck('category_id')->toArray();
            $categories= Category::whereIn('id',$userCategories)->get();
        }

        return view('posts.create')->with([
            'categories' => $categories
        ]);
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (!$request->hasFile('image') || !$request->file('image')->isValid()) {
            $this->setFlash('error', 'Gecerli bir gorsel yukleyin !');
            return Redirect::back();
        }

        $path = $this->storeFile($request->file('image'), 'images/posts/', null);

        $post = Post::create([
            'category_id' => $request->get('category_id'),
            'writer_id' => Auth::id(),
            'image' => $path,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'is_active' => $request->exists('is_active') && $request->get('is_active') === 'on'
        ]);

        $this->setFlash('success', ' Haber Olusturuldu !');

        return Redirect::route('news.index');

    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $post = Post::find($id);

        if (!$post) {
            $this->setFlash('error', 'Post bulunamadi');
            return Redirect::back();
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $this->storeFile($request->file('image'), 'images/posts/', null);

        } else {
            $image = $post->image;
        }


        $post->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'image' => $image,
            'is_active' => $request->exists('is_active') && $request->get('is_active') === 'on'
        ]);


        return Redirect::route('news.index');

    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            $this->setFlash('error', 'Post bulunamadi');
            return Redirect::back();
        }
        $categories = Category::get();

        return view('posts.create')->with([
            'categories' => $categories,
            'thePost' => $post
        ]);
    }

    public function activate(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            $this->setFlash('error', 'Post bulunamadi');
            return Redirect::back();
        }

        $post->update([
            'is_active' => !$post->is_active
        ]);
        $this->setFlash('success', 'Post Guncellendi');
        return Redirect::back();
    }

    private function setFlash($type, $message)
    {
        Session::flash('message', $message);
        Session::flash('type', $type);
    }
}
