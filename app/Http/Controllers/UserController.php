<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Tạo
        //Role::create(['name' => 'Editer2']);
        //Permission::create(['name' => 'Delete']);

       
        $permission = Permission::find(4);
        $role = Role::find(4);
            //Gán vai trò
        // $role->givePermissionTo($permission);
        //$permission->assignRole($role); //Đè quyền

            //Bỏ vai trò
        // $role->revokePermissionTo($permission);
        // $permission->removeRole($role);

            //Thêm role cho người đăng nhập *(Model)
        //auth()->user()->assignRole('Editer');
            //Thêm vai trò
        //auth()->user()->givePermissionTo('Edit');

          
        //$user = User::find(1);
            //Kiểm tra quyền
        //dd($user->getDirectPermissions());

            //Check vai trò
        // if($user->hasDirectPermission('Create','Delete','Edit')){
        //     echo 'có';
        // }else{
        //     echo 'ko';
        // }
        
        return view('admincp.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}