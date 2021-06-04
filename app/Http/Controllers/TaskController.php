<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::orderBy('created_at', 'DESC')->paginate(2);
        $tasks = Task::orderBy('created_at', 'DESC')->paginate(5);
        //dd($tasks);
        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $task = Task::create($request->all());
            if($task){
                $tasks = Task::orderBy('created_at', 'DESC')->paginate(5);
              
                return response()->json($tasks);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $article = Task::find($id);
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $article = Task::find($id);
       
        if($request->isXmlHttpRequest()){
            $requestData = $request->all();
            $title = $requestData['title'];
            $content = $requestData['content'];

            $article->update([
                'title' => $title,
                'content' => $content
            ]);

            $tasks = Task::orderBy('created_at', 'DESC')->paginate(5);
              
            return response()->json($requestData);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $article = Task::find($id);
        if($request->isXmlHttpRequest()){
            $article->delete();
            $tasks = Task::orderBy('created_at', 'DESC')->paginate(5);
                
            return response()->json($tasks);
        }
    }
}
