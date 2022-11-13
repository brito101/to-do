<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = date('Y-m-d');
        if ($request->date) {
            $date = $request->date;
        }

        $day = date('d/m/Y', strtotime($date));
        $dayPrev = date('Y-m-d', strtotime($date . '- 1day'));
        $dayAfter = date('Y-m-d', strtotime($date . '+ 1day'));

        $tasks = Task::where('user_id', Auth::user()->id)
            ->whereDate('due_date', $date)
            ->with('category')
            ->get();
        return view('to-do.home.index', compact('tasks', 'day', 'dayPrev', 'dayAfter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('to-do.tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['done'] = $request->done ? true : false;
        $data['user_id'] = Auth::user()->id;
        $task = Task::create($data);
        return redirect()->route('todo.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            abort(403, 'Acesso não autorizado');
        }

        $categories = Category::all();
        return view('to-do.tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['done'] = $request->done ? true : false;
        $task = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$task) {
            abort(403, 'Acesso não autorizado');
        }

        $task->update($data);
        return redirect()->route('todo.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$task) {
            abort(403, 'Acesso não autorizado');
        }

        $task->delete();
        return redirect()->route('todo.home');
    }

    public function updateStatus(Request $request)
    {
        $task = Task::find($request->id);
        if ($task) {
            $task->done = $request->status;
            $task->save();
            return \response()->json(['success' => true]);
        } else {
            return \response()->json(['success' => false]);
        }
    }
}
