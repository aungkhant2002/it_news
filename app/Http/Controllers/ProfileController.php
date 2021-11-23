<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profile()
    {
        return view("user-profile.profile");
    }

    public function editNameEmail()
    {
        return view("user-profile.change-name-email");
    }

    public function changeName(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:50"
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->update();
        return redirect()->back();
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            "email" => "required|min:5|max:50"
        ]);

        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->update();
        return redirect()->back();
    }

    public function editPassword()
    {
        return view("user-profile.edit-password");
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            "current_password" => ['required', new MatchOldPassword()],
            "new_password" => ['required', 'min:8'],
            "new_confirm_password" => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->back();
    }

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

        Storage::delete($dir . Auth::user()->photo);

        $newFileName = uniqid() . "_photo." . $request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir, $newFileName);

        $user = User::find(Auth::id());
        $user->photo = $newFileName;
        $user->update();
        return redirect()->back();
    }
}
