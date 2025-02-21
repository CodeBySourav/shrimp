<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
 
use App\Mail\SendUsernameMail;
use App\Mail\send_password;
use App\Models\User;



class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request) 
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        $temporaryPassword = Str::random(8);   
        $user->password = Hash::make($temporaryPassword);
        $user->save();
      
        Mail::to($user->email)->send(new send_password($temporaryPassword));

        return redirect('/login')->with('success', 'Your password will be sent to your email. Please check your inbox.');

    }
    public function username_get(Request $request) 
    { 
        $request->validate([
            'email' => 'required|email',
        ]);
     
        $user = User::where('email', $request->email)->first();
    
        if ($user) { 
            Mail::to($user->email)->send(new SendUsernameMail($user->username));
            return redirect('login')->with('success', 'Your username will be sent to your email. Please check your inbox.');
        } else { 
            return redirect()->back()->withErrors(['email' => 'The provided email does not match any user.']);
        }
    }
    

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();
    
            // Redirect to login with success message
            return redirect()->route('login')->with('success', 'Password reset successfully!');
        }
    
        // Redirect back with an error message if user not found
        return back()->withErrors(['email' => 'The provided email could not be found.']);
    }
}
