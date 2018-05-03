<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;  

class TasksController extends Controller
{

   public function index(Request $request)
    {   
        $data = [];
        $searchWord = $request->get('s');
        $searchType = $request->get('t');
        $searchState = $request->get('st');
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $query = $user->tasks();
            /*検索部分*/
            if ($searchWord) {
                $query->where('content', 'like', "%$searchWord%")
                     /* ->orWhere('state', 'like', "%$searchWord%")
                      ->orWhere('type', 'like', "%$searchWord%")*/
                      ->orderBy('content')->get();
            }
            if ($searchType) {
                $query->Where('Type', '=', "$searchType")
                      ->orderBy('Type')->get();
            }
            if ($searchState) {
                $query->where('state','=',"$searchState")
                      ->orderBy('state')->get();
            }
            
            $tasks = $query->orderBy('type', 'state','desc')->paginate(20);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('welcome' , $data);
    }

    
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        
        $request->user()->tasks()->create([
            'content' => $request->content,
            'state' => $request->state,
            'type' => $request->type,
        ]);
    
        return redirect('/');
    }

    
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->content = $request->content;
        $task->state = $request->state;
        $task->type = $request->type;
        $task->save();

        return redirect('/');
    }

    
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}
