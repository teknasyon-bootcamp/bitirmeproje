<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $items = UserCategory::orderBy('id', 'desc')
            ->with('user', 'manager', 'category')
            ->get();

        return view('permissions.index')->with([
            'items' => $items
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        $editors = User::where('type_id', 3)->get();

        return view('permissions.create')->with([
            'categories' => $categories,
            'editors' => $editors
        ]);

    }

    public function store(Request $request)
    {
        $userCategory = UserCategory::where([
            'user_id' => $request->get('user_id'),
            'category_id' => $request->get('category_id'),
        ])->first();

        if ($userCategory) {
            $userCategory->update([
                'manager_id' => Auth::id(),
                'is_active' => true
            ]);
        }else{
            $userCategory = UserCategory::create([
                'user_id' => $request->get('user_id'),
                'category_id' => $request->get('category_id'),
                'manager_id' => Auth::id(),
                'is_active' => true
            ]);
        }

        $this->setFlash('success','Izin olusturuldu');

        return Redirect::back();
    }

    public function activate(Request $request, $id)
    {
        $thePermission = UserCategory::find($id);

        $thePermission->update([
            'is_active' => !$thePermission->is_active
        ]);

        $this->setFlash('success', 'Izin guncellendi');

        return Redirect::back();
    }

    private function setFlash($type, $message)
    {
        Session::flash('message', $message);
        Session::flash('type', $type);
    }
}
