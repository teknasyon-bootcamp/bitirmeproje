<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('profile.index')->with([
            'setting' => $settings
        ]);
//        dd(Auth::user());
    }

    public function delete_reqs()
    {
        $users = User::where('delete_request', '!=', 0)
            ->paginate(10);


        return view('profile.list')->with([
            'users' => $users,
            'isDelete' => true,
            'title' => 'Talepleri Listele'
        ]);
    }

    public function complete_req(Request $request, $id)
    {
        $user = User::find($id);

        $comments = Comment::where('user_id', $user->id)->get();
        foreach ($comments as $comment) $comment->delete();

        $user->delete();

        $this->setFlash('success', 'Hesap Silindi');


        return Redirect::back();
    }

    public function list()
    {
        $users = User::with('type')->get();

        return view('profile.list')->with([
            'users' => $users
        ]);
    }

    public function activate(Request $request, $id)
    {
        $thePermission = User::find($id);

        $thePermission->update([
            'is_active' => !$thePermission->is_active
        ]);

        $this->setFlash('success', 'Izin guncellendi');

        return Redirect::back();
    }

    public function deactivate(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'delete_request' => 1
        ]);
        return Redirect::back();
    }

    public function create()
    {
        if (Auth::user()->type_id === 1) {
            $selects = [
                [
                    'id' => 2,
                    'label' => 'Moderator'
                ],
                [
                    'id' => 3,
                    'label' => 'Editor'
                ],
            ];
        } else {
            $selects = [
                [
                    'id' => 3,
                    'label' => 'Editor'
                ],
            ];
        }

        return view('profile.create')->with([
            'selects' => $selects
        ]);
    }

    public function store(Request $request)
    {
        $checkUsername = User::where('username', $request->get('username'))
            ->where('id', '!=', Auth::id())
            ->first();

        if ($checkUsername) {
            $this->setFlash('error', 'Kullanici Adi Kullanilamaz');
            return Redirect::back();
        }


        $user = User::create([
            'type_id' => $request->get('type_id'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'email' => $request->get('email'),
        ]);

        $this->setFlash('success', 'Kullanici Olusturuldu !');
        return Redirect::back();
    }

    public function update(Request $request)
    {
        $checkUsername = User::where('username', $request->get('username'))
            ->where('id', '!=', Auth::id())
            ->first();

        if ($checkUsername) {
            $this->setFlash('error', 'Kullanici Adi Kullanilamaz');
            return Redirect::back();
        }

        $user = Auth::user();

        $user->update([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'password' => $request->get('password') ? Hash::make($request->get('password')) : $user->password
        ]);
        $this->setFlash('success', 'Profil Guncellendi');
        return Redirect::back();
    }

    public function comments()
    {
        $comments = Comment::where('user_id', Auth::id())
            ->with('post', 'user')
            ->paginate(20);

        return view('comments.index')->with([
            'comments' => $comments
        ]);
    }


    private function setFlash($type, $message)
    {
        Session::flash('message', $message);
        Session::flash('type', $type);
    }
}
