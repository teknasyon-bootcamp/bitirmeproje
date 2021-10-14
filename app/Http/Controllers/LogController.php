<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = LoginLog::orderBy('id', 'desc')
            ->with('user')
            ->paginate(10);


        return view('logs.index')->with(['logs' => $logs]);
    }
}
