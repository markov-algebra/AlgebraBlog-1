<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $this->validate(request(), ['body' => 'required|min:2']);

        Comment::create([
            'body' => request('body'),
            'post_id' => $id,
            'user_id' => auth()->id()
        ]);

        return back();
    }

}
