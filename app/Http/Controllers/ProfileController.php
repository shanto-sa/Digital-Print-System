<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $validatedData = $request->validated();

        $filename = $request->user()->profile_photo;


        if ($request->file('profile_photo') != null) {
            $profile_photo = $request->file('profile_photo');
            $filename = Str::random(10) . '.' . $profile_photo->getClientOriginalExtension();
            $profile_photo->move(public_path('images/users'), $filename);

            $old_photo = $request->user()->profile_photo;
            if ($old_photo) {
                $old_photo = public_path('images/users/' . $old_photo);

                if (file_exists($old_photo)) {
                    unlink($old_photo);
                }
            }
        }
        $validatedData['profile_photo'] = $filename;

        $request->user()->fill($validatedData);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with(Toastr::success('Profile Information Updated'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'account_password' => ['required', 'current_password'],
        ], [
            'account_password.required' => 'The password field is required',
            'account_password.current_password' => 'Incorrect password',
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
