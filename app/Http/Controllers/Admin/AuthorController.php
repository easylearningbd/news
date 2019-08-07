<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $page_name = 'Authors';
       $data = User::where('type',2)->get();
       return view('admin.author.list',compact('page_name','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Author Create';
        $roles = Role::pluck('name','id');
        return view('admin.author.create',compact('page_name','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'name' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|size:6',
         'roles.*' => 'required',   

        ],[
           'name.required' => "Name field is required",
           'email.email' => "Invalid Email Format ",
           'email.unique' => "User Email Already Exist",
           'password.size' => "Password Must Be 6 Characeters or More",

        ]);

       $author = new User();
       $author->name = $request->name;
       $author->email = $request->email;
       $author->password = Hash::make($request->password);
       $author->type = 2;
       $author->save();
       foreach ($request->roles as $value) {
          $author->attachRole($value);
       }

   return redirect()->action('Admin\AuthorController@index')->with('success','Author Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = 'Author Edit';
        $author = User::find($id);
        $roles = Role::pluck('name','id');
        $selectedRoles = DB::table('role_user')->where('user_id',$id)->pluck('role_id')->toArray();
        return view('admin.author.edit',compact('page_name','author','selectedRoles','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
         'name' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|size:6',
         'roles.*' => 'required',   

        ],[
           'name.required' => "Name field is required",
           'email.email' => "Invalid Email Format ",
           'email.unique' => "User Email Already Exist",
           'password.size' => "Password Must Be 6 Characeters or More",

        ]);

       $author = User::find($id);
       $author->name = $request->name;
       $author->email = $request->email;
       $author->password = Hash::make($request->password);
       $author->save();
       DB::table('role_user')->where('user_id',$id)->delete();
       foreach ($request->roles as $value) {
          $author->attachRole($value);
       }

   return redirect()->action('Admin\AuthorController@index')->with('success','Author Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->action('Admin\AuthorController@index')->with('success','Author Delete Successfully');
    }
}
