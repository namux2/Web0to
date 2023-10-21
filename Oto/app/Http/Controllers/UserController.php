<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.listusers', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa thành công.');
    }
    public function edit($id)
{
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
    }

    return view('admin.edituser', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
    }

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role = $request->input('role');


    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được cập nhật thành công.');
}

}
