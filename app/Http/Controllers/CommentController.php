<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Food;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $food_id = $request->food_id;

        Comment::create([
            'body' => $request->cmt_body,
            'user_id' => Auth::id(),
            'food_id' => $food_id
        ]);
        return redirect()->route('food.show', $food_id);
    }
}
