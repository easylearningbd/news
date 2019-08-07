<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $page_name = 'Permission';
       $data = Permission::all();
       return view('admin.permission.list',compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [ 
            'name'=>'required|'
          ],[
            'name.required'=>"Name Field is Required",
            'name.alpha_num'=>"Name field accpets alpha numeric charaters"
           ]); 
         
         $permission = new Permission();
         $permission->name = $request->name;
         $permission->display_name = $request->display_name;
         $permission->description = $request->description;
         $permission->save();
         return redirect()->action('Admin\PermissionController@index')->with('success',"Permission Created Successfully");

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
        $page_name = 'Permission Edit';
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission','page_name'));
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
         $this->validate($request, [ 
            'name'=>'required|alpha_num'
          ],[
            'name.required'=>"Name Field is Required",
            'name.alpha_num'=>"Name field accpets alpha numeric charaters"
           ]); 
         
         $permission = Permission::find($id);
         $permission->name = $request->name;
         $permission->display_name = $request->display_name;
         $permission->description = $request->description;
         $permission->save();
         return redirect()->action('Admin\PermissionController@index')->with('success',"Permission Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->action('Admin\PermissionController@index')->with('success',"Permission Deleted Successfully");
    }
}
