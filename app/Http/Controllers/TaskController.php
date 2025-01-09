<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createPage(){
        return view('panel.tasks.create');
    }
    public function addTask(Request $request){

        $task = new tasks();
        $task->category_id = 1;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();
        return redirect()->back();
    }
}
