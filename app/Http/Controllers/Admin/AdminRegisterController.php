<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRegisterController extends Controller
{
    public function create(Request $request)
    {
        return view('pages.auth.register.create');
    }

    public function store(AdminStoreRequest $request)
    {
        $params = $request->all();
        $params['password'] = bcrypt($params['password']);
        Admin::create($params);
        return redirect()->route('admin.auth.index');
    }

    public function edit(Request $request)
    {
        return view('pages.auth.register.edit', ['user' => Auth::user()]);
    }

    public function update(AdminUpdateRequest $request)
    {
        $params = $request->except(['password']);
        if($request->password) {
            $params['password'] = bcrypt($request->password);
        }

        Auth::user()->fill($params)->save();
        return redirect()->route('admin.auth.index');
    }

}
