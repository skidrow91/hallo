<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ListTask;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ListTask::get();
        $results = [];
        foreach ($list as $item) {
            $results[] = [
                'id' => $item->id,
                'name'=> $item->name,
                'board_id' => $item->board_id
            ];
        }
        return response()->json(['list' => $results], 200);
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
        $itemName = $request->input('name');
        $boardId = $request->input('board_id');
        $status = 200;
        try {
            $data = [
                'name' => $itemName,
                'board_id' => $boardId
            ];
            $list = ListTask::create($data);
            // echo "<pre/>";
            // print_r($board);
            // exit();
            return response()->json(['message' => 'The list created successfully.', 'list' => [
             'id' => $list->id,
             'name' => $list->name,
             'board_id' => $list->board_id
            ]], $status);
        } catch (Exception $ex) {
            return response()->json(['message' => 'An error occured'], 500);
        }
    }

    public function getByBoardId(Request $request) 
    {
        $boardId = $request->get('board_id');
        try {
            $list = ListTask::where('board_id', $boardId)->get();
            $items = [];
            foreach ($list as $item) {
                $items[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'board_id' => $item->board_id
                ];
            }
            return response()->json(['list' => $items]);
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
