<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $user->update($request->all());
            return redirect()->route('users.show', $user->id)->with('success', '编辑成功');
        }catch (\Exception $exception) {
            session()->flash('error', '编辑失败，请稍后再试');
            return response('', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
