<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Video;
use App\Comment;
use App\Notification;

class LikeController extends Controller
{
    public function like(Request $request)
    {
    	$video = Video::find($request->id);
    	$user = Auth::User();
    	$isFavourite = $user->favourite_videos()->where('video_id',$request->id)->count();

    	if($isFavourite == 0)
    	{
    		$user->favourite_videos()->attach($video);
            $notification = new Notification();
            $notification->user_id = Auth::User()->id;
            $notification->parent_id = $video->user_id;
            $notification->body = 'Liked Your Video';
            $notification->link = 'video/'.$video->slug;
            $notification->save();
    		return "like";
    	}else{
    		$user->favourite_videos()->detach($video);
            // dd($user);

    		return "dislike";
    	}
    }

    public function like2(Request $request)
    {
    	$video = Video::find($request->id);
    	$user = Auth::User();
    	$isFavourite = $user->favourite_videos()->where('video_id', $request->id)->count();

    	if($isFavourite == 0)
    	{
    		$user->favourite_videos()->attach($video);
            $notification = new Notification();
            $notification->user_id = Auth::User()->id;
            $notification->parent_id = $video->user_id;
            $notification->body = 'Liked Your Video';
            $notification->link = 'video/'.$video->slug;
            $notification->save();
            $like = "like";
            return view('layouts.frontend.section.singlevideo',compact('like'));
    		return "like";
    	}else{
    		$user->favourite_videos()->detach($video);
    		return "dislike";
    	}
    }

    public function comment_like(Request $request)
    {
        $comment = Comment::find($request->id);
        $user = Auth::User();
        $isFavourite = $user->favourite_comments()->where('comment_id',$request->id)->count();

        if($isFavourite == 0)
        {
            $user->favourite_comments()->attach($comment);
            return $comment->favourite_to_user->count();
        }else{
            $user->favourite_comments()->detach($comment);
            return $comment->favourite_to_user->count();
        }
    }

    public function cartegory_show(Request $request) {
    	$user_id = Auth::User()->id;
        $videos = Video::where('user_id', $user_id)->where('cartegory', 1)->get();
        return view('cartegory', compact('videos'));
    }

    public function cartegory()
    {
        $id = $_GET['id'];
        // dd($id);
    	$user = Auth::User();
    	$videoes = Video::where('user_id', $user->id)->where('id',$id)->get();
        // dd($cartegories);
        foreach ( $videoes as $video) {
            if( $video->cartegory == 0 ) {
                $isCartegory = "add";
                $video->cartegory = 1;
                $video->save();
            }
            else {
                $isCartegory = "disAdd";
                $video->cartegory = 0;
                $video->save();
            }
        }

    	if($isCartegory === "add")
    	{
            $addCart = "addCart";
            echo $addCart;
    		// return "addCart";
    	}else{
            $addCart = "disCart";
            echo $addCart;
            //  response()->json($addCart);
    		// return "already add";
    	}
    }

    public function videoApprove() {
        $id = $_GET['id'];
        $video = Video::find($id);
        if($video->approve == 0) {
            $video->approve = 1;
        }
        else if($video->approve==1) {
            $video->approve = 0;
        }
        $video->save();
         echo $video->approve;
    }

}
