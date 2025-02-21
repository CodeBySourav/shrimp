<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

    public function profile_view(Request $request): View
    {
        $user = Auth::user();  
 
        return view('profile.view', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Define validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'email_1' => 'nullable|email',
            'contact_number' => 'required|string|max:15',
        ];

        // Add conditional validation based on the role
        if (Auth::user()->role != 2) {
            $rules['company_name'] = 'nullable|string|max:255';
            $rules['address'] = 'nullable|string|max:500';
        }

        // Validate the data
        $validatedData = $request->validate($rules);

        // Update user profile
        $user = Auth::user();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->email_1 = $validatedData['email_1'] ?? null;
        $user->contact_number = $validatedData['contact_number'];

        if ($user->role != 2) {
            $user->company_name = $validatedData['company_name'] ?? null;
            $user->address = $validatedData['address'] ?? null;
        }

        // Save the changes
        $user->save();

        // Redirect with success message
        return redirect('profile-view')->with('success', 'Profile updated successfully!');
    } 

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
