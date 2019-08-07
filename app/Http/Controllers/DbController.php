<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class DbController extends Controller
{
    public function index(){
     //$all = DB::table('employee')->select('name','age','city')->get();
     //$all = DB::table('employee')->pluck('email','city');
     // $single = DB::table('employee')->first();
     // $order = DB::table('employee')->orderBy('id','DESC')->get();
     //$limit = DB::table('employee')->orderBy('id','DESC')->limit(1)->get();
    // $count = DB::table('employee')->count();
     //$offset = DB::table('employee')->orderBy('salary','DESC')->offset(0)->limit(1)->get();
    $min = DB::table('employee')->max('salary');
     dd($min);

    }

   public function joining(){
   	$result = DB::table('order')
   			->join('user','user.id', '=','order.user_id')
   			->select('user.name','order.id','order.amount','order.order_date')
   			->where('status',1)
   			->get();
   			dd($result);
   }


  public function model(){
  	$result = Employee::all();
  	dd($result);
  }
  

}
