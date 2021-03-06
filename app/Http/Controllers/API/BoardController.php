<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Board;
use Auth;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
            $boards = Board::get();
            $results = [];
            foreach ($boards as $board) {
                $results[] = [
                    'id' => $board->id,
                    'name'=> $board->name,
                    'user_id' => $board->user_id
                ];
                // echo "<pre/>";
                // print_r($board->name);
                // exit();
            }
            return response()->json(['boards' => $results], 200);
            // echo "<pre/>";
            // print_r($boards);
            // exit();
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $boardName = $request->input('name');
        $status = 200;
        try {
            $userId = Auth::user()->id;
            $data = [
                'name' => $boardName,
                'user_id' => $userId
            ];
            $board = Board::create($data);
            // echo "<pre/>";
            // print_r($board);
            // exit();
            return response()->json(['message' => 'The board created successfully.', 'boards' => [
             'id' => $board->id,
             'name' => $board->name,
             'user_id' => $board->user_id
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
