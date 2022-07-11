<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->with('category')->paginate(4);
        return view('to-do.home.index', compact('tasks'));
    }
}
