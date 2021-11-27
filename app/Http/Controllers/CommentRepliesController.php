<?php

namespace App\Http\Controllers;

use App\CommentRepy;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\CommentReply;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
         // Extraigo la info del usuario que inició sesion
         $user = Auth::user();
         // dd($user->photo->file);
         // \FB::log('En post comments cont user es ; ', $user->photo->file);
 
         $data = [
             'comment_id' => $request->post_id,
             'author' => $user->name,
             'email' => $user->email,
             'photo' => $user->photo->file,
             'body' => $request->body
         ];
 
         CommentReply::create($data);
 
         $request->session()->flash('reply_message','Your message has benn submiteed');
 
         return  redirect()->back();
     
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

    public function createReply(Request $request)
    {
        $user = Auth::user();
        // dd($user->photo->file);
        // \FB::log('En post comments cont user es ; ', $user->photo->file);

        $data = [
            'comment_id' => $request->post_id,
            'author' => $user->name,
            'email' => $user->email,
            'photo' => $user->photo->file,
            'body' => $request->body
        ];

        CommentReply::create($data);

        $request->session()->flash('reply_message','Your message has benn submiteed');

        return  redirect()->back();
    }
}
