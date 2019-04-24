<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function like(Request $request){

        $foodId = $request->food_id;
        $userId = Auth::id();
        $countLike = Like::where([['food_id',$foodId],['user_id', $userId]])->count();
        $checkLike = $countLike > 0 ? true : false;

        if ($checkLike > 0) {

            $like = DB::table('likes')->where([['food_id',$foodId],['user_id', $userId]])->value('like');

            if ($like == false) {
                DB::table('likes')->where([['food_id',$foodId],['user_id', $userId]])->update(['like' => '1']);
            } else {
                DB::table('likes')->where([['food_id',$foodId],['user_id', $userId]])->update(['like' => '0']);
            }
        } else {
            $dataInsertToDatabase = array(
                'food_id' => $foodId,
                'user_id'  => $userId,
                'like' => true
            );

            Like::insert($dataInsertToDatabase);
        }

        return redirect()->route('food.show', $foodId);
    }
}
