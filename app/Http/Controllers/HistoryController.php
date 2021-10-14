<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::where('user_id', Auth::id())
            ->with('user', 'post')
            ->paginate(10);


        return view('history.index')->with([
            'history' => $history,
            'title' => 'Gecmis'
        ]);
    }
}
