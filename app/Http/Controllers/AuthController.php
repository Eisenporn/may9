<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:6|max:32|same:re_password',
            'name'=>'required|min:2|max:64|unique:users,name'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validate();
        $validated['password']=Hash::make($validated['password']);

        $user = User::query()->create($validated);
        Auth::login($user);

        return redirect()->route('home');
    }

    public function signin(SignInRequest $request)
    {
        $validated = $request->validated();
        if (!Auth::attempt($validated)){
            return back()->withErrors(['Введенные вами данные неверны']);
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
