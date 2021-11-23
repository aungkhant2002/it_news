<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function editPhoto()
    {
        return view("user-profile.edit-photo");
    }

    public function changePhoto(Request $request)
    {
        $request->validate([
            "photo" => "required|mimetypes:image/jpeg,image/png|dimensions:ratio=1/1|file|max:2500"
        ]);

        $dir = "public/profile/";

        Storage::delete($dir.Auth::user()->photo);

        $newFileName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir, $newFileName);

        $user = User::find(Auth::id());
        $user->photo = $newFileName;
        $user->update();
        return redirect()->back();
    }
}
