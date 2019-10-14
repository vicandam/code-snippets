<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        return view('user.settings', compact('user'));
    }
}
