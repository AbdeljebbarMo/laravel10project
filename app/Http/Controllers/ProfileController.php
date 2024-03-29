<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Fetch authenticated user's profile data
        $user = auth()->user();

        // Return the profile view with user data
        return view('profile.show', ['user' => $user]);
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        // Update the authenticated user's profile with the validated data
        $user = auth()->user();
        $user->update($validatedData);

        // Redirect back to the profile page with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
