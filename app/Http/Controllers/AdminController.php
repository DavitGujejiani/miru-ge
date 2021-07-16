<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function bannerUpdate(Request $request, $id) 
    {
        Banner::delete_image($id);
        $image_name = Banner::upload_image($request->file('image'));
        Banner::update_table($request, $image_name, $id);
        return redirect()->back()->withErrors('ბანერი შეიცვალა');
    }

    public function bannersShow() {
        if ($this->invalidAdmin()) { return $this->invalidAdmin(); }
        return view('admin.bannersShow');
    }

    public function bannerShow(Banner $banner) {
        if ($this->invalidAdmin()) { return $this->invalidAdmin(); }
        return view('admin.bannerShow');
    }
    
    public function create() {
        // dd(Storage::disk('image_uploads'));
        if ($this->invalidAdmin()) { return $this->invalidAdmin(); }

        return view('admin.create');
    }


    public function dashboard() {
        if ($this->invalidAdmin()) 
        {
            return $this->invalidAdmin();
        }
        return view('admin.dashboard');
    }

    public function invalidAdmin() 
    {
        if (!Auth::check()) {return redirect('/login');}
        if (Auth::id() !== 1) {return redirect('/');}
        return null;
    }
}

