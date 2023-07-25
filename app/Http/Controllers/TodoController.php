<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Carbon;

class Todocontroller extends Controller

{
    public function index() 
          
 { 
    return Todo:: orderBy('created_at', 'DESC')->get();
 }

 public function create() 
          
 { 

 } 
 public function store(Request $request) 
          
 {
  
   $newTodo= new Todo;

   $newTodo->name= $request->name;
   $newTodo->save();

   return $newTodo;
 }  
 public function show() 
          
 { 

 } 
 public function edit() 
          
 { 

 } 
 public function update(Request $request, $id)
{ 
   $existingTodo = Todo::find($id);

   if ($existingTodo) {
      $completed = $request->input('completed');
      $existingTodo->completed = $completed ? true : false;
      $existingTodo->completed_at = $completed ? Carbon::now() : null;
      $existingTodo->save();

      return $existingTodo;
   }

   return 'Todo not found';
}


 public function destroy($id) 
          
 { 

  $existingTodo = Todo::find($id);

  if ($existingTodo) {
    $existingTodo->delete();
    return "Item successfully deleted.";
  }

  return "Item not found";
 } 
};
