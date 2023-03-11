<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPasswordChangeController extends Controller
{
    public function change_password(Request $req, User $user)
    {
        $req->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update([
            'password' => Hash::make($req->password)
        ]);
        return redirect()->route('users.index')->with('message', 'New Password Successfully Updated!');
    }
}
