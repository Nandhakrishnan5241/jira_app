<?php

namespace App\Http\Controllers;

use App\Mail\MailController;
use App\Models\Task;
use App\Models\Tasklist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'title',
            'body'  => 'body'
        ];
        $tasks = [];
        $usersList = [];
        $user = Auth::user();

        if ($user->role == 'admin') {
            $tasks = Tasklist::all();
            $usersList = User::where('role', '!=', 'admin')->get();
            $assignedTaskLists  = Task::all();
        } elseif ($user->role == 'team_lead') {
            $tasks              = Tasklist::all();
            $usersList = User::where('role', 'employee')->get();
            $assignedTaskLists  = Task::where('role', 'team_lead')->get();
        } elseif ($user->role == 'employee') {
            // $tasks = Task::where('assigned_to', $user->id)->get();
            $assignedTaskLists  = Task::where('assigned_to', $user->email)->get();
        }
        $count = 1;
        return view('tasks.index', compact(['tasks', 'usersList', 'assignedTaskLists', 'count']));
    }
    public function assignTask(Request $request)
    {
        
        $title        = $request->input('title');
        $assigned_to  = $request->input('assigned_to');
        $description  = $request->input('description');
        $status       = $request->input('status');

        $user = Auth::user();
        $task = new Task();

        $task->title = $title;
        $task->description = $description;
        $task->assigned_by = $user->email;
        $task->assigned_to = $assigned_to;
        $task->role       = $user->role;
        $task->status      = $status;

        $task->save();
        return redirect()->back()->with('success', 'Task assigned successfully.');
    }
}
