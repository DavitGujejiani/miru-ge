<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create() {
        $this->validateAdmin();

    }

    public function dashboard() {
        $this->validateAdmin();
        return view('admin.dashboard');
    }

    public function validateAdmin() 
    {
        if (!Auth::check()) {return redirect('/admin/login');}
        if (Auth::id() !== 1) {return redirect('/index');}
    }
}

