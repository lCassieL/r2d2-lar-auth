<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TaskController extends Controller
{
    /**
   * Создание нового экземпляра контроллера.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  /**
 * Отображение списка всех задач пользователя.
 *
 * @param  Request  $request
 * @return Response
 */
public function index(Request $request)
{
    $tasks=$request->user()->tasks;
  return view('tasks.index',['tasks'=>$tasks,]);
}

/**
 * Создание новой задачи.
 *
 * @param  Request  $request
 * @return Response
 */
public function store(Request $request)
{
  $this->validate($request, [
    'name' => 'required|max:255',
  ]);

  $request->user()->tasks()->create([
    'name' => $request->name,
  ]);

  return redirect('/tasks');
}

public function destroy(Task $task, Request $request){
    $this->authorize('destroy', $task);
    $task->delete();
    return redirect('/tasks');
}
}
