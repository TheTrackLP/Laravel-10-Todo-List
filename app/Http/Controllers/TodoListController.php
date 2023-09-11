<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function ViewList(){
        $showList = TodoList::latest()->get();
        return view('welcome', compact('showList'));
    }

    public function AddList(Request $request){
        $request->validate([
            'task_title' => 'required',
            'task_description' => 'required',
        ]);

        TodoList::insert([
            'task_title' => $request->task_title,
            'task_description' =>$request->task_description,
        ]);

        $notification = array(
            'message' => 'Task Added Successfully',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }

    public function EditList($id){
        $showData = TodoList::findorfail($id);
        return view('edit_list', compact('showData'));
    }

    public function UpdateList(Request $request){
        $pid = $request->id;

        TodoList::findorfail($pid)->update([
            'task_title' => $request->task_title,
            'task_description' =>$request->task_description,
        ]);

        
        $notification = array(
            'message' => 'Property Type SuccessFully Updated',
            'alert-type' => 'success',
        );

        return redirect('/')->with($notification);
    }

    public function DeleteList($id){
        TodoList::findorfail($id)->delete();

        return redirect('/');
    }
}
