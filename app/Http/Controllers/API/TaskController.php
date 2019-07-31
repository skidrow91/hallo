<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        $results = [];
        foreach ($tasks as $item) {
            $results[] = [
                'id' => $item->id,
                'name'=> $item->name,
                'description' => $item->description,
                'list_id' => $item->list_id
            ];
        }
        return response()->json(['tasks' => $results], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $listId = $request->input('list_id');
        $status = 200;
        try {
            $data = [
                'name' => $itemName,
                'description' => $description,
                'list_id' => $listId
            ];
            $task = Task::create($data);
            // echo "<pre/>";
            // print_r($board);
            // exit();
            return response()->json(['message' => 'The task created successfully.', 'task' => [
             'name' => $task->id,
             'description' => $task->description,
             'list_id' => $task->list_id
            ]], $status);
        } catch (Exception $ex) {
            return response()->json(['message' => 'An error occured'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
