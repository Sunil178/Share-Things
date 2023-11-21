<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
        ]);
        $user = User::where('token', $request->token)->first();
        if ($user) {
            Auth::login($user);
            return redirect('thing');
        }
        return back();
    }
}
