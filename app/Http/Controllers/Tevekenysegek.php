<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tevekenysegek as Tevekenyseg;

class Tevekenysegek extends Controller
{
    public function index()
    {
        $tasks=Tevekenyseg::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $task=new Tevekenyseg();
        $task->tevekenyseg_nev=$request->tevekenyseg_nev;
        $task->pontszam=$request->pontszam;

        $task->save();
    }
    public function update(Request $request, $taskId)
    {
        $task=Tevekenyseg::find($taskId);
        $task->tevekenyseg_nev=$request->tevekenyseg_nev;
        $task->pontszam=$request->pontszam;
        $task->save();
    }

    public function destroy($taskId)
    {
        $task=Tevekenyseg::find($taskId);
        $task->delete();
    }

}
