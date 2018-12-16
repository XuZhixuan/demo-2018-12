<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // 通过这个方法访问所有用户
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user) //这里定义了传入变量是 User 类的实例，框架会自动通过请求的地址寻找这个实例
    {
        // 通过这个方法获取用户详情
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        //通过这个方法获取修改用户信息的页面
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        // 通过这个方法实现更新用户信息
        $this->validate($request, [
            //这里写验证规则
            'name' => 'required|max:50',
            'password' => 'confirmed'
            //验证规则可在Laravel文档中找到
        ]); //验证输入的字段

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.show', $user);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->intended('/'); //表示返回之前的页面，如果没有则返回首页
    }
}
