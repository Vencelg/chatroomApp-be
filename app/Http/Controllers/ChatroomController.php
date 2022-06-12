<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatroomRequest;
use App\Models\Chatroom;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $chatrooms = Chatroom::all();

        return response()->json([
            'chatrooms' => $chatrooms
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreChatroomRequest $request)
    {
        $newChatroom = new Chatroom([
            'name' => $request->name
        ]);
        $newChatroom->save();

        return response()->json([
            'chatroom' => $newChatroom
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $chatroom = Chatroom::with('messages')->where('id', $id)->first();

        return response()->json([
            'chatroom' => $chatroom
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
