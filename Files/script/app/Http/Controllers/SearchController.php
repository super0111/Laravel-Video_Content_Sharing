<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use App\User;

class SearchController extends Controller
{
    public function userSearch(Request $request)
    {
    	$searchTerm = $request->search;
    	$data = User::query()
			   ->orWhere('username', 'LIKE', "%{$searchTerm}%") 
			   ->orWhere('first_name', 'LIKE', "%{$searchTerm}%") 
			   ->orWhere('last_name', 'LIKE', "%{$searchTerm}%") 
			   ->orWhere('email', 'LIKE', "%{$searchTerm}%")
			   ->paginate(15);
		return view('search',compact('data'));
    }

	public function videoSearch(Request $request)
    {
    	$searchTerm = $request->search;
    	$videos = Video::where('approve', 1)->where( 'title', 'LIKE', '%' . $searchTerm . '%')->get();
		// echo $videos;
		// exit;
		return view('video1',compact('videos'));
    }

	public function videoSearch_cart(Request $request)
    {
    	$searchTerm = $request->search;
    	$videos = Video::where([['cartegory', 1],['approve', 1]])->where( 'title', 'LIKE', '%' . $searchTerm . '%')->get();
		// echo $videos;
		// exit;
		return view('video1',compact('videos'));
    }
}
