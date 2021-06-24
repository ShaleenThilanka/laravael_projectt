<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;
class TaskController extends Controller
{
   public function store(Request $request){
       $task=new task;

$this->validate($request,[
    'task'=>'required |max:100|min:5',
]);

       $task->task=$request->task;
       $task->save();
       $data=task::all();

       return view('taskView')->with('taskView',$data);
    //    dd($data);
    //    return redirect()->back();
    //    return view('/task');
       
   } 

   public function UpdateTaskAsCompleted($id){
       $task=task::find($id);
       $task->isCompleted=1;
       $task->save();
       return redirect()->back();
   }
   public function UpdateTaskAsNotCompleted($id){
    $task=task::find($id);
    $task->isCompleted=0;
    $task->save();
    return redirect()->back();
}

    public function DeleteTask($id){
        $task=task::find($id);
        $task->delete();
      
        return redirect()->back();
    }
    public function UpdateViewTask($id){
        $task=task::find($id);
      
      
        return view('updateTaskView')->with('taskdata',$task);
    }
    
    
    public function UpdateTask(Request $request){
      $id=$request->id;
      $task=$request->task;
      $data=task::find($id);
      $data->task=$task;
      $data->save();
      
      $datas=task::all();

      return view('taskView')->with('taskView',$datas);
    
    }
}
