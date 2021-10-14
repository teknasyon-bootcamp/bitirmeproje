<?php

namespace App\Http\Controllers;


use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    public function index()
    {

        return view('home')->with([
            'data' => []
        ]);
    }

    public function favorite(Request $request, $id)
    {

        $fav = Favorite::where([
            'user_id' => Auth::id(),
            'category_id' => $id
        ])->with('category')->find($id);

        if ($fav) {
            $fav->delete();
        } else {
            $fav = Favorite::firstOrCreate([
                'user_id' => Auth::id(),
                'category_id' => $id
            ]);
        }

        $posts = Post::where('category_id', $id)->paginate(9);

        $categories = \App\Models\Category::get();

        return view('index')->with([
            'posts' => $posts,
            'categories' => $categories,
            'isFav' => true,
            'categoryName' => $fav->category->name
        ]);
    }

    public function favoriteIndex(Request $request)
    {
        $favs = Favorite::where([
            'user_id' => Auth::id(),
        ])
            ->with('user', 'category')
            ->get();


        return view('favorites.index')->with([
            'favs' => $favs,
            'title' => 'Favori Kategori'
        ]);
    }

    public function favoriteDelete(Request $request, $id)
    {
        $fav = Favorite::find($id);

        $fav->delete();

        $this->setFlash('success', 'Favori silindi !');

        return Redirect::back();
    }


    private function setFlash($type, $message)
    {
        Session::flash('message', $message);
        Session::flash('type', $type);
    }
}
