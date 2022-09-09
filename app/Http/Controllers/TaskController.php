<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Classes\HideId;
use PDOException;

class TaskController extends Controller
{
    /**
     * Loads the home page
     * @return void
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('welcome', compact('tasks'));
    }

    /**
     * Creates data in database
     * @param Request $request
     * @return void
     */
    public function createTask(Request $request)
    {
       
        $request->validate([
            'task'=>['required', 'max:40', 'min:2']
        ]);

        $task = new Task();

        try
        {
            $task->task = $request->input('task');
            $task->save();
            return redirect()->back();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Deletes data in database
     * @param int $id
     * @return void
     */
    public function deleteTask($id)
    {
        $revealed = HideId::reveal($id);
        Task::destroy($revealed);
        return redirect()->back();
    }

    /**
     * Loads the update page
     * @param int $id
     * @return void
     */
    public function updatePage($id)
    {
        $revealed = HideId::reveal($id);
        $task = Task::find($revealed);

        return view('update_page', compact('task'));
    }

    /**
     * Updates data in database
     * @param Request $request
     * @return void
     */
    public function updateTask(Request $request)
    {
        $id = $request->input('the_id');

        $task = Task::find($id);

        try
        {
            $task->task = $request->input('task');
            $task->save();
            return redirect()->route('index');
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Puts the value true in the column 'done' in a specific row
     * @param int $id
     * @return void
     */
    public function done($id)
    {
       $revealed = HideId::reveal($id); 
       $task = Task::find($revealed);

       try
       {
        $task->done = true;
        $task->save();
 
        return redirect()->back();
       }
       catch(PDOException $e)
       {
        return $e->getMessage();
       }

    }

    /**
     * Puts the value false in the column 'done' in a specific row
     * @param int $id
     * @return void
     */
    public function undone($id)
    {
        $revealed = HideId::reveal($id); 
        $task = Task::find($revealed);

        try
        {
         $task->done = false;
         $task->save();
  
         return redirect()->back();
        }
        catch(PDOException $e)
        {
         return $e->getMessage();
        }
    }

    /**
     * Search field of database
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
 
        $tasks = Task::where('task', 'like', "%$q%")->get();
   
        return view('welcome', compact('tasks'));
    }
}
