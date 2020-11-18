<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Show the application user profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     * profile update
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateprofile(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('profile')->with('success','Account Updated');
    }

    /**
     * profile picture update
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateprofilepicture(ProfileRequest $request)
    {
        $user = Auth::user();
        $image = $request->files->get('image');
        $destinationPath = 'assets/images/users/'; // upload path
        if ($user->avatar && file_exists(public_path().'/assets/images/users/'.$user->avatar)) {
            unlink(public_path().'/assets/images/users/'.$user->avatar);
        }
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $user->avatar = $profileImage;
        $user->save();
        return redirect()->route('profile')->with('success','Picture Updated');
    }

    public function changepassword(Request $request) {
        try {
            $this->validate($request, [
                'password' => ['required'],
                'new_password' => ['confirmed', 'required', 'regex:#^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$#','different:password'],
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('profile')->with('error',implode(",",$e->errors()['new_password']));
        }
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            return redirect()->route('profile')->with('success', 'Password Changed');

        } else {
            return redirect()->route('profile')->with('error','Incorrect Current Password');
        }
    }
}
