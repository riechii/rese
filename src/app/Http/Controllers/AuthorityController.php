<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AuthorityController extends Controller
{
    //ユーザー一覧
    public function userList()
    {
        $users = User::all();

        return view('user_list',compact('users'));
    }

    //権限変更フォーム表示
    public function showUserEdit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('user_edit',compact('user','roles'));
    }

    //権限変更
    public function userEdit(Request $request,$id)
    {
        $user = User::find($id);
        $user->syncRoles([$request->input('roles')]);

        return redirect()->route('userList')->with('message', '権限を更新しました。');
    }

    //権限剥奪
    public function revokeRoles (Request $request,$id)
    {
        $user = User::find($id);
        $user->syncRoles([]);

        return redirect()->route('userList')->with('message', '権限を剥奪しました。');
    }
}
