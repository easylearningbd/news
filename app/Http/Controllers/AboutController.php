<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
    	$first_name = 'Ariyan';
    	$last_name = 'Kazi';
    	return view('front.layout.master',compact('first_name','last_name'));
    }
}
