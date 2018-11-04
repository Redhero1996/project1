<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Like;
use Session;

class LikeController extends Controller
{
    public function likeTopic(Request $request)
    {
        $topic_id = $request->topic_id;
        $liked = (int)$request->like;    
        $topic = Topic::findOrFail($topic_id);
        $user = Auth::user();
        $liker = $user->likes()->where('topic_id', $topic_id)->first();
        if ($liker) {
            if ($liker->status == $liked) {
                $liker->delete();
                $dataResponse = [
                    'like' => $liked,
                    'isLike' => false,
                    'like_count' => count($topic->likes()->where('status', 1)->get()),
                    'dislike_count' => count($topic->likes()->where('status', 0)->get()),
                ];
            } else {
                $liker->status = $liked;
                $liker->save();
                $dataResponse = [
                    'like' => $liked,
                    'isLike' => true,
                    'like_count' => count($topic->likes()->where('status', 1)->get()),
                    'dislike_count' => count($topic->likes()->where('status', 0)->get()),
                ];
            }
        } else {
            $like = new Like();
            $like->user_id = $user->id;
            $like->topic_id = $topic->id;
            $like->status = $liked;
            $like->user()->associate($user->id);
            $like->topic()->associate($topic->id);
            $like->save();
            $dataResponse = [
                'like' => $liked,
                'isLike' => true,
                'like_count' => count($topic->likes()->where('status', 1)->get()),
                'dislike_count' => count($topic->likes()->where('status', 0)->get()),
            ];
        }

        return $dataResponse;
    }
}
