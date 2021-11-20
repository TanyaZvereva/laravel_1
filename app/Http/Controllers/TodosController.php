<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    public function index()   {
		$data = [];
		$todos = DB::table('todos')->get();
		foreach($todos as $key => $todo){
			$array = (array) $todo;
			$data[] = $array;
		}
		
		return view('todo_list',['tasks'=>$data,'title'=>'list']);			 
	}
	
	public function view()   {
	
		$id = str_replace('/todo/','',$_SERVER['REQUEST_URI']);
		if (!is_numeric($id)){
			return 'ID is not numeric!';
		}
		$task = DB::table('todos')->where('id', '=', $id)->get();
		
		if (!isset($task[0])){
			return 'ID task not found';
		}
		
		$task = (array) $task[0];		
		$tasks[] = $task;
		
		return view('todo_list',['tasks'=>$tasks,'title'=>'ID '.$id]);		 
	}
	
	public function form()   {
		
		return view('todo_form');
	}
	
	public function create()   {
		$data = [$_POST['title'],$_POST['description'], date('Y-m-d H:i:s')];
		DB::insert('insert into todos (title, description, created_at) values (?, ?, ?)', $data);
		header('Location: /todo');
		exit();
	}
	
	public function remove()   {
		$id = str_replace('/todo/remove/','',$_SERVER['REQUEST_URI']);
		if (!is_numeric($id)){
			return 'ID is not numeric!';
		}
		DB::delete('delete from todos where id = ?', [$id]);
		
		header('Location: /todo');
		exit();
	}
}
