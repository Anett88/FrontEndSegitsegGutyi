<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bejegyzesek as Bejegyzes;


class Bejegyzesek extends Controller
{
    public function index()
    {
        $tasks=Bejegyzes::all();
        return response()->json($tasks);
    }


    public function store(Request $request)
    {
        $task=new Bejegyzes();
        $task->tevekenyseg_id=$request->tevekenyseg_id;
        $task->osztaly_id=$request->osztaly_id;
        $task->allapot=$request->allapot;

        $task->save();
    }
    public function update(Request $request, $taskId)
    {
        $task=Bejegyzes::find($taskId);
        $task->tevekenyseg_id=$request->tevekenyseg_id;
        $task->osztaly_id=$request->osztaly_id;
        $task->allapot=$request->allapot;
        $task->save();
    }

    public function destroy($taskId)
    {
        $task=Bejegyzes::find($taskId);
        $task->delete();
    }
}
