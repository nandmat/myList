<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(){

        return view('content.tasks.index', [
            'tasks' => Tarefa::where('status', 'Em progresso')->get()
        ]);

    }

    public function store(Request $request)
    {

        $task = $request->validate([
            'tarefa' => ['required']
        ],
        [
            'tarefa' => 'A tarefa não pode ser vazia'
        ]);

        $task['status'] = "Em progresso";

        if($task = Tarefa::create($task))
        {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('erro', 'Dados Inválidos!');
        }

    }

    public function destroy($id){
        Tarefa::destroy($id);
        return redirect()->route('index');
    }

    public function finishedTask($id){
        $task = Tarefa::find($id);
        $task->status = "Finalizada";
        $task->save();

        return redirect()->route('index');
    }
}
