<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function saveImage(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'selectedFile' => 'required|mimes:jpeg,png,jpg,gif'
            ]
        );
        if ($validator->fails()) {
            $response = array(
                'status' => 'fail',
                'msg' => 'Image not Saved',
            );
            return response()->json($response);
        }

        if ($request->hasfile('selectedFile')) {
            $img_tmp = $request->file('selectedFile');

            $extension = $img_tmp->getClientOriginalExtension();

            $filename = uniqid() . '.' . $extension;

            $img_path = 'assets/images/uploads' . $filename;

            Image::make($img_tmp)->resize(200, 200)->save($img_path);
            $user = User::where(['email' => Auth::user()->email])->first;
            $user->picture = $filename;
            $user->update();
            $response = array(
                'status' => 'success',
                'msg' => 'Image Saved',
            );
            return response()->json($response);
        }
    }
}
