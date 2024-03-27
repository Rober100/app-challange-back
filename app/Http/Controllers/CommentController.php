<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string',
        ]);

        // Crear un nuevo comentario
        $comment = Comment::create([
            'task_id' => $request->input('task_id'),
            'user_id' => $request->input('user_id'),
            'comment' => $request->input('comment'),
        ]);

        return response()->json($comment, 201);
    }

    /**
     * Display the specified comment.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        // Mostrar un comentario específico
        return response()->json($comment, 200);
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // Eliminar el comentario
        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}

