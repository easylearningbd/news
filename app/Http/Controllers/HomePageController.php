<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomePageController extends Controller
{
    public function index(){

   $top_viewed = Post::with('creator')->withCount('comments')->where('status',1)->orderBy('view_count','DESC')->limit(2)->get();	

   $hot_news = Post::with('creator')->withCount('comments')->where('hot_news',1)->where('status',1)->orderBy('id','DESC')->first();

   $category_posts = Category::with('posts')->where('status',1)->orderBy('id','DESC')->limit(5)->get();


    	return view('front.home',compact('top_viewed','hot_news','category_posts'));
    }
}
