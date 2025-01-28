<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = tasks::get();
        $user = Auth::user();
        $tasks = $user->getTasks;
        return view('panel.tasks.index', compact('tasks'));
    }

    public function createPage(){
        $categories=categories::where('user_id',Auth::user()->id)->get();
        return view('panel.tasks.create', compact('categories'));
    }
    public function addTask(Request $request){

        $task = new tasks();
        $task->category_id = $request->category;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();
        return redirect()->route('home')->with('succes', 'Görev Başarıyla yüklendi!');
    }
}
