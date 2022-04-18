<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    public function create(Request $request)
    {
        return view('pages.auth.register.create');
    }

    public function store(UserStoreRequest $request)
    {
        $params = $request->all();
        $params['password'] = bcrypt($params['password']);
        User::create($params);
        return redirect()->route('user.auth.index');
    }

    public function edit(Request $request)
    {
        return view('pages.auth.register.edit', ['user' => Auth::user()]);
    }

    public function update(UserUpdateRequest $request)
    {
        $params = $request->except(['password']);
        if($request->password) {
            $params['password'] = bcrypt($request->password);
        }

        Auth::user()->fill($params)->save();
        return redirect()->route('user.auth.index');
    }

}
